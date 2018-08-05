<?php

class Album
{
    private $_name;
    private $_user_id;

    /**
     * Album constructor.
     * @param string $name
     * @param int $user_id
     */
    public function __construct($name = null, $user_id = null)
    {
        $this->_name = $name;
        $this->_user_id = $user_id;
    }

    public function add()
    {
        Database::exec('INSERT INTO album(name, user_id) VALUES (?, ?)',[
            $this->_name, $this->_user_id
        ]);
        redirect('album&id='.Database::getLastId());
    }

    /**
     * @param int $user_id
     * @return array
     */
    public static function getByUserId($user_id)
    {
        $albums = Database::query('SELECT * FROM album WHERE user_id = ?', [
            $user_id
        ]);

        return $albums;
    }
}