<?php
checkAccess($_GET['album_id']);

if(empty($_POST)) {
    ?>
    <div id="addPicture">
        <div class="content">
            <h1>Ajouter une image</h1>
            <?php
            if (isset($_GET['error'])) {
                echo 'Le format et/ou le poids de l\'image ne correspond pas.<br>
                    Pour information, les formats autorisés sont JPEG et PNG et le poids maximal est 3Mo';
            }
            ?>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="title" required placeholder="Titre de l'image"><br>
                <textarea name="description" placeholder="Description de l'image"></textarea><br>
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
    $picture = new Picture($_POST['title'], $_POST['description'], $_FILES['picture'], $_POST['folder_id']);
    $picture->add($_GET['album_id']);
}
?>
