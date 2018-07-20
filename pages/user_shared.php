<?php
checkAccess($_GET['album_id']);

if(isset($_GET['delete'])){
    deleteUserShared($_GET['album_id'], $_GET['delete']);
}
?>
<div id="usersShared">
    <h1>Liste des personnes partagées</h1>
    <?php
    $usersShared = usersShared($_GET['album_id']);

    foreach ($usersShared as $user){
        ?>
        <div class="user">
            <span>
                Album partagé avec <?php echo $user['email'] ?>.
            </span>
            <a href=?page=user_shared&album_id=<?php echo $_GET['album_id'] ?>&delete=<?php echo $user['id']?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
        </div>
        <?php
    }
    ?>
</div>
