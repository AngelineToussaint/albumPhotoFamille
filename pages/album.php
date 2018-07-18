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
        <div class="share_album">
            <div>
                <a href="?page=share_album&album_id=<?php echo $album['id'] ?>">
                    <button>
                        <i class="fa fa-share" aria-hidden="true"></i>
                        Partager mon album
                    </button>
                </a>
            </div>
            <div>
                <a href="?page=user_shared&album_id=<?php echo $album['id'] ?>">
                    <button>
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Liste des personnes partagées
                    </button>
                </a>
            </div>
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
        $pictures = getPictures($_GET['folder_id']);
        foreach ($pictures as $picture) {
            ?>
            <div class="picture" data-id="<?php echo $picture['id'] ?>" style="background-image: url('img/upload/<?php echo $picture['picture'] ?>')">
            </div>
            <div class="lightbox <?php echo $picture['id'] ?>" style="display: none">
                <img src="img/upload/<?php echo $picture['picture'] ?>">
            </div>
            <?php
        }
    }
    ?>
    <div class="background-lightbox" style="display: none">
        <i class="fa fa-times fa-3x close_lightbox"></i>

        <i class="fa fa-chevron-left fa-3x switch_picture prev_picture"></i>
        <i class="fa fa-chevron-right fa-3x switch_picture next_picture"></i>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.add_folder').click(function () {
            $('.form_folder').slideToggle(300);
        });

        $('.picture').click(function (){
            var id = $(this).data('id');
            $('.lightbox.' + id).addClass('show').fadeIn(200);
            $('.background-lightbox').fadeIn(200);
        });

        $('.close_lightbox').click(function(){
            $('.lightbox').removeClass('show').fadeOut(200);
            $('.background-lightbox').fadeOut(200);
        });

        $('.switch_picture').click(function () {

            // Index of the lightbox showing
            var index = 0,
                lightboxs = $('.lightbox');

            for (var i = 0; i < lightboxs.length; i++) {
                if (lightboxs.eq(i).hasClass('show')) {
                    index = i;
                }
            }

            if ($(this).hasClass('next_picture')) {
                if (lightboxs.length == (index + 1)) {
                    // Get the first lightbox, if length of lightboxs is equal to the next lightbox
                    var lightboxToShow = lightboxs.eq(0);
                }
                else {
                    // Else, get the next lightbox
                    var lightboxToShow = lightboxs.eq(index + 1);
                }
            }
            else {
                if (index == 0) {
                    // Get the last lightbox, if the lightbox showing is the first
                    var lightboxToShow = lightboxs.eq(lightboxs.length - 1);
                }
                else {
                    // Else, get the previous lightbox
                    var lightboxToShow = lightboxs.eq(index - 1);
                }
            }

            $('.lightbox').removeClass('show').fadeOut(200);
            lightboxToShow.addClass('show').fadeIn(200);
        })
    })
</script>