<?php

class User
{
    private $_lastname;
    private $_firstname;
    private $_email;
    private $_pw;

    /**
     * User constructor.
     * @param string $lastname
     * @param string $firstname
     * @param string $email
     * @param string $pw
     */
    public function __construct($email, $pw, $lastname = null, $firstname = null)
    {
        $this->_email = $email;
        $this->_pw = $pw;
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
    }

    public function add(){
        if(empty($this->_email) || empty($this->_pw)){
            redirect('register&error=empty_content');
        }

        $user = Database::query("SELECT * FROM user WHERE email = ?", [$this->_email]);

        if (count($user) == 0) {
            Database::exec('INSERT INTO user(lastname, firstname, email, pw) VALUES (?, ?, ?, ?)', [
                $this->_lastname, $this->_firstname, $this->_email, sha1($this->_pw)
            ]);
            redirect('login');
        }
        else {
            redirect('register&error=email_already_used');
        }
    }

    public function login(){
        $user = Database::queryFirst("SELECT * FROM user WHERE email = ? AND pw= ?", [
            $this->_email, sha1($this->_pw)
        ]);

        if ($user != null) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'firstname' => $user['firstname']
            ];
            redirect('home');
        }
        redirect('login&error=bad_login');
    }

    public static function getByEmail($email)
    {
        $user = Database::queryFirst('SELECT * FROM user WHERE email = ?', [
            $email
        ]);

        return $user;
    }
}