<?php
if (empty($_POST)){
?>
    <div id="login">
        <div class="content">
            <h1>Connexion</h1>
            <?php
            if(isset($_GET['error']) && $_GET['error'] == 'bad_login'){
                echo 'Email ou mot de passe incorrect';
            }
            ?>
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="pw" placeholder="Mot de passe"><br>
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
    <?php
}
else{
    login($_POST);
}
?>