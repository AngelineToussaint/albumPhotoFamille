<?php
session_start();
include 'header.php';

include 'Database.php';

include 'functions/functions.php';
include 'functions/fct_login.php';
include 'functions/fct_register.php';

router();

include 'footer.php';