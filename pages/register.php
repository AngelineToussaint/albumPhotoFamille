<div id="register">
    <div class="content">
        <h1>Inscription</h1>
        <?php
        if (isset($_GET['inscription'])) {
            if ($_GET['inscription'] == 'false') {
                echo '<p style="color: red;">Informations incorrect</p>';
            } elseif ($_GET['inscription'] == 'email_deja_pris'){
                echo '<p style="color: red;">Email déjà pris</p>';
            }
        }
        ?>
        <form method="post" action="?page=inscription">
            <input type="text" name="nom" placeholder="Nom"><br>
            <input type="text" name="prenom" placeholder="Prénom"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="mdp" placeholder="Mot de passe"><br>
            <input type="submit" value="S'inscrire">
        </form>
    </div>
</div>