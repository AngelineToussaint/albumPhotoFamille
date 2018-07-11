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

function addFolder($title, $album_id){
    Database::exec('INSERT INTO folder(name,date, album_id) VALUES (?, ?, ?)',[
        $title, time(), $album_id
    ]);
    redirect('album&id='.$album_id);
}

function getFolder($album_id){
    $folders = Database::query('SELECT * FROM folder WHERE album_id = ?',[
        $album_id
    ]);
    return $folders;
}

function addPicture($title, $description, $picture, $folder_id, $album_id){
    $nameFile = upload($picture, 3000000, ['png', 'jpg', 'jpeg']);

    if ($nameFile == false) {
        redirect('add_picture&album_id='. $album_id .'&error=true');
    }

    Database::exec('INSERT INTO picture (title, description, date, picture, folder_id) VALUES (?, ?, ?, ?, ?)',[
        $title, $description, time(), $nameFile, $folder_id
    ]);

    redirect('album&id='. $album_id);
}