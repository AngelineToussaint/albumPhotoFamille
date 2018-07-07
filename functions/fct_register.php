<?php

function register($data){
    if(empty($data['email']) || empty($data['pw'])){
        redirect('register&error=empty_content');
    }

    $user = Database::query("SELECT * FROM user WHERE email = ?", [$data['email']]);

    if (count($user) == 0) {
        Database::exec('INSERT INTO user(lastname, firstname, email, pw) VALUES (?, ?, ?, ?)', [
            $data['lastname'], $data['firstname'], $data['email'], sha1($data['pw'])
        ]);
        redirect('login');
    }
    else {
        redirect('register&error=email_already_used');
    }
}