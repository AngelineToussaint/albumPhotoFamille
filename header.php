<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Album photo familial</title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div class="page">
        <div class="menu">
            <div class="title">
                Album photo
            </div>
            <div class="content">
                <ul>
                    <li>
                        <a href="?page=home">Accueil</a>
                    </li>
                    <?php
                    if(!isset($_SESSION['user'])){
                        ?>
                        <li>
                            <a href="?page=login">Connexion</a>
                        </li>
                        <li>
                            <a href="?page=register">Inscription</a>
                        </li>
                        <?php
                    }
                    else{
                        ?>
                        <li>
                            <a href="">Mon album</a>
                        </li>
                        <li>
                            <a href="">Albums partagés</a>
                        </li>
                        <li>
                            <a href="">Notifications</a>
                        </li>
                        <li>
                            <a href="?page=disconnect">Déconnexion</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <hr class="clear">
        </div>