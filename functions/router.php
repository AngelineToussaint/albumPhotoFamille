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