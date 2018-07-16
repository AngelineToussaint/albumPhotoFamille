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

    redirect('album&id='. $album_id .'&folder_id='. $folder_id);
}

function shareAlbum($email, $album_id){
    $user = Database::queryFirst('SELECT * FROM user WHERE email = ?', [
       $email
    ]);

    // If user does not exist with this email or the user is the logged user
    if ($user == null || $user['id'] == $_SESSION['user']['id']){
        redirect('share_album&album_id=' . $album_id .'&error=no_user');
    }

    $share = Database::queryFirst('SELECT * FROM album_share WHERE user_id = ? AND album_id = ?', [
       $user['id'], $album_id
    ]);

    // If the album is already shared to this user
    if ($share != null) {
        redirect('share_album&album_id=' . $album_id .'&error=already_shared');
    }

    Database::exec('INSERT INTO album_share(album_id, user_id) VALUES (?,?)', [
        $album_id, $user['id']
    ]);

    redirect('album&id=' . $album_id);
}

function getPictures($folder_id)
{
    $getPictures = Database::query('SELECT * FROM picture WHERE folder_id = ?', [
        $folder_id
    ]);

    return $getPictures;
}