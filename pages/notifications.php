<div id="notification">
    <h1>Notifications</h1>
    <?php
    Notification::removeNotifications($_SESSION['user']['id']);

    $albums = ShareAlbum::getByUserId($_SESSION['user']['id']);

    foreach ($albums as $album){
        ?>
        <div class="notif">
            <span>
                L'album <?php echo $album['name']?> vous a été partagé.
            </span>
            <a href="?page=album&id=<?php echo $album['id'] ?>">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </div>
        <?php
    }
    ?>
</div>