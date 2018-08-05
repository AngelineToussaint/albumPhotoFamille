<?php
session_start();
include 'Database.php';

include 'functions/functions.php';

include 'classes/User.php';
include 'classes/ShareAlbum.php';
include 'classes/Album.php';
include 'classes/Folder.php';
include 'classes/Picture.php';
include 'classes/Notification.php';

include 'header.php';

router();

include 'footer.php';