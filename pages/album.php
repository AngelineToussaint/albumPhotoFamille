<?php

$album  = Database::queryFirst('SELECT * FROM album WHERE id = ?',[
    $_GET['id']
]);
?>

<div id="album">
    <h1>
        <?php
        echo $album['name'];
        ?>
    </h1>
    <span>Dossiers :</span><br>
    <button>
        <i class="fa fa-plus" aria-hidden="true"></i>
        Ajouter
    </button>
    <form method="post" action="?page=add_folder&id=<?php echo $album['id'] ?>">
        <input type="text" name="title" placeholder="Titre du dossier">
        <input type="submit">
    </form>
</div>
