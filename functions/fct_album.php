<?php

function addAlbum($album){
    Database::exec('INSERT INTO album(name, user_id) VALUES (?, ?)',[
        $album['name'], $_SESSION['user']['id']
    ]);
    redirect('album&id='.Database::getLastId());
}

function getAlbumsOfUser($user_id){
    $albums = Database::query('SELECT * FROM album WHERE user_id = ?', [
        $user_id
    ]);

    return $albums;
}



