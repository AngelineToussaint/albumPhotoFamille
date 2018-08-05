<div id="albums">
    <div class="content">
        <h1>Mes Albums</h1>
        <?php

        $albums = Album::getByUserId($_SESSION['user']['id']);

        foreach ($albums as $album){
            ?>
            <div class="link">
                <a href="?page=album&id=<?php echo $album['id'] ?>">
                    <i class="fa fa-link" aria-hidden="true"></i>
                    <?php echo $album['name'] ?>
                </a>
            </div>
            <?php
        }
        ?>
        <a href="?page=add_album">
            <button>Ajouter un album</button>
        </a>
    </div>
</div>