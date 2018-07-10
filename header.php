<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Album photo familial</title>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
                            <a href="?page=albums">
                                Mes albums
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </a>
                            <ul class="submenu">
                                <li>
                                    <a href="?page=add_album">Ajouter un album</a>
                                </li>
                                <?php
                                $albums = getAlbumsOfUser($_SESSION['user']['id']);

                                foreach ($albums as $album){
                                    ?>
                                    <li>
                                        <a href="?page=album&id=<?php echo $album['id'] ?>"><?php echo $album['name'] ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
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