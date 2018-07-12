<?php

function router() {
    if (!isset($_GET['page'])){
        $page = 'home';
    }
    else {
        $page = $_GET['page'];
    }

    if (file_exists('pages/'. $page .'.php')) {
        include 'pages/'. $page .'.php';
    } else {
        include 'pages/error404.php';
    }
}

function redirect($page) {
    header('location: ?page='.$page);
    die();
}

function upload($file, $size, $extensions) {
    $extensionFile = str_replace('image/', '', $file['type']);

    if ($file['size'] > $size) {
        return false;
    } elseif (!in_array($extensionFile, $extensions)) {
        return false;
    }

    $nameFile = hash('sha1', microtime($file['name'])) .'.'. $extensionFile;

    move_uploaded_file($file['tmp_name'], 'img/upload/' . $nameFile);
    chmod('img/upload/' . $nameFile, 0755);

    return $nameFile;
}

