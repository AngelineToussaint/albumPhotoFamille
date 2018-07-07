<?php

function login($data) {
    $user = Database::queryFirst("SELECT * FROM user WHERE email = ? AND pw= ?", [
        $data['email'], sha1($data['pw'])
    ]);

    if($user != null) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'firstname' => $user['firstname']
        ];
        redirect('home');
    }
    redirect('login&error=bad_login');
}