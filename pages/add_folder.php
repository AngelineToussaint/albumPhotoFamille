<?php
checkAccess($_GET['id']);

addFolder($_POST['title'], $_GET['id']);