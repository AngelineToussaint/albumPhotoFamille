<?php
session_start();
include 'Database.php';

include 'functions/functions.php';
include 'functions/fct_login.php';
include 'functions/fct_register.php';
include 'functions/fct_album.php';

include 'header.php';

router();

include 'footer.php';