<?php
checkAccess($_GET['album_id']);

if(empty($_POST)) {
    ?>
    <div id="shareAlbum">
        <div class="content">
            <h1>Partager un album</h1>
            <?php
            if (isset($_GET['error'])) {
                if($_GET['error'] == 'no_user'){
                    echo 'L\'email ne correspond à aucun utilisateur';
                }
                elseif ($_GET['error'] == 'already_shared'){
                    echo 'Album déjà partagé avec cet utilisateur';
                }
            }
            ?>
            <form method="post" action="">
                <input type="email" name="email" required placeholder="Email de l'utilisateur">
                <br>
                <input type="submit">
            </form>
        </div>
    </div>
    <?php
} else {
    $user = User::getByEmail($_POST['email']);

    if ($user == null || $user['id'] == $_SESSION['user']['id']) {
        redirect('share_album&album_id=' . $_GET['album_id'] .'&error=no_user');
    }

    $shareAlbum = new ShareAlbum($_GET['album_id'], $user['id']);
    $shareAlbum->add();
}
?>
