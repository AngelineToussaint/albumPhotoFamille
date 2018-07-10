<?php

$album  = Database::queryFirst('SELECT * FROM album WHERE id = ?',[
    $_GET['id']
]);
?>

<div id="album">
    <div class="title">
        <h1>
            <?php
            echo $album['name'];
            ?>
        </h1>
        <div class="add_picture">
            <a href="?page=add_picture&album_id=<?php echo $album['id'] ?>">
                <button>
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Ajouter une image
                </button>
            </a>
        </div>
    </div>

    <span>Dossiers :</span><br>
    <button class="add_folder">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Ajouter un dossier
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
            <div style="display: inline-block;">
                <a href="?page=album&id=<?php echo $album['id'] ?>&folder_id=<?php echo $folder['id'] ?>">
                    <button>
                        <?php echo $folder['name']; ?>
                    </button>
                </a>
            </div>
            <?php
        }
        ?>
    </div>

    <?php
    if (isset($_GET['folder_id'])) {
        ?>

        <?php
    }
    ?>
</div>


<script>
    $(document).ready(function () {
        $('.add_folder').click(function () {
            $('.form_folder').slideToggle(300);
        });
    })
</script>