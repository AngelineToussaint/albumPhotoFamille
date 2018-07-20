<div id="home">
    <div class="row r1">
        <div class="col">
            <img src="img/mountain.jpg" style="width: 100%">
        </div>
        <div class="col">
            <div class="content">
                <h1>Album Photo</h1>
                <p class="description">Créez un album photo qui vous ressemble !</p>
            </div>
        </div>
    </div>
    <div class="row r2">
        <div class="col">
            <div class="content">
                <h1>Partage de photo</h1>
                <p class="description">Partagez vos photos avec vos amis et votre famille en quelques clics !</p>
            </div>
        </div>
        <div class="col">
            <img src="img/share.jpg" style="width: 100%">
        </div>
    </div>
    <?php
    if(!isset($_SESSION['user'])){
        ?>
        <div class="row r3">
            <a class="col btn" href="?page=register">
            INSCRIPTION
            </a>
            <a class="col btn" href="?page=login">
            CONNEXION
            </a>
        </div>
        <?php
    }
    ?>
    <div class="row r4">
        <div class="col">
            <div class="content">
                <h1>Fonctionnement du site</h1>
                <p class="description">Découvrez le fonctionnement en image !</p>
            </div>
        </div>
        <div class="col">
            <img src="img/myAlbums.PNG">
        </div>
    </div>
    <div class="row r5">
        <div class="col">
            <img src="img/travels.PNG">
        </div>
        <div class="col">
            <img src="img/albumShare.PNG">
        </div>
    </div>
</div>