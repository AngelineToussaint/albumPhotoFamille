<?php

if(empty($_POST)) {
    ?>
    <div id="addAlbum">
        <div class="content">
            <h1>Nouvel Album</h1>
            <form method="post" action="">
                <input type="text" name="name" required placeholder="Nom de l'album"><br>
                <input type="submit">
            </form>
        </div>
    </div>
    <?php
} else {
    $album = new Album($_POST['name'], $_SESSION['user']['id']);
    $album->add();
}
?>
