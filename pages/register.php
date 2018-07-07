<?php
if (empty($_POST)){
    ?>
    <div id="register">
        <div class="content">
            <h1>Inscription</h1>
            <?php
            if(isset($_GET['error']) && $_GET['error'] == 'empty_content'){
                echo 'Email ou mot de passe non défini';
            }
            elseif (isset($_GET['error']) && $_GET['error'] == 'email_already_used'){
                echo 'Email déjà pris';
            }
            ?>
            <form method="post" action="">
                <input type="text" name="lastname" placeholder="Nom"><br>
                <input type="text" name="firstname" placeholder="Prénom"><br>
                <input type="email" name="email" required placeholder="Email"><br>
                <input type="password" name="pw" required placeholder="Mot de passe"><br>
                <input type="submit" value="S'inscrire">
            </form>
        </div>
    </div>
    <?php
}
else{
    register($_POST);
}
?>
