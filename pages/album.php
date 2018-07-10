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
    <button class="add_folder">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Ajouter
    </button>
    <form method="post" action="?page=add_folder&id=<?php echo $album['id'] ?>" class="form_folder">
        <input type="text" name="title" placeholder="Titre du dossier">
        <input type="submit">
    </form>
    <?php
    $folders = getFolder($_GET['id']);
    ?>
    <div class="folder">
        <?php
        foreach ($folders as $folder){
            ?>
            <button>
            <?php echo $folder['name']; ?>
            </button>
            <?php
        }
        ?>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.add_folder').click(function () {
            $('.form_folder').slideToggle(300);
        });
    })
</script>