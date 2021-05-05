<!DOCTYPE html>
<html lang="fr">
<?php require "head.html.php" ?>
<body>
    <?php require "navbar.html.php" ?>
    <div class="container">
    <form action="<?= $path ?>/connect" method="POST">
        <fieldset class="offset-3 col-6 my-2">
            <legend>Connectez-Vous!</legend>
            <div>
            <label for="email">Email :</label>
            <input class="form-control" type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Votre Prénom :</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">Se Connecter</button>
        </div>
        </fieldset>
    </form>
    
    </div>
</body>
<?php require "script.html.php" ?>
</html>