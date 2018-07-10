<?php

if(empty($_POST)) {
    ?>
    <div id="addPicture">
        <div class="content">
            <h1>Ajouter une image</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="title" required placeholder="Titre de l'image"><br>
                <textarea name="title" placeholder="Description de l'image"></textarea><br>
                <input type="file" name="picture" required placeholder="Image à ajouter"><br>
                <select name="folder_id">
                    <?php
                    $folders = getFolder($_GET['album_id']);

                    foreach ($folders as $folder) {
                        ?>
                        <option value="<?php echo $folder['id'] ?>"><?php echo $folder['name'] ?></option>
                        <?php
                    }
                    ?>
                </select><br>
                <input type="submit">
            </form>
        </div>
    </div>
    <?php
} else {
    addPicture($_POST);
}
?>
