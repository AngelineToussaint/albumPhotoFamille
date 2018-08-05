<?php
checkAccess($_GET['id']);

$folder = new Folder($_POST['name'], time(), $_GET['id']);
$folder->add();