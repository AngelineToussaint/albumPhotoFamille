<div id="albumsShared">
    <div class="content">
        <h1>Albums Partagés avec moi</h1>
        <?php
        $albums = ShareAlbum::getByUserId($_SESSION['user']['id']);

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
    </div>
</div>