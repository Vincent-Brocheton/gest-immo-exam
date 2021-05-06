<!doctype html>
<html lang="en">
<?php require "head.html.php" ?>
<body>
<?php require "navbar.html.php" ?>
<div class="container">

    <?php foreach ($chambres as $chambre): ?>
        <form class="form-group" action="<?= $path ?>/reserved/<?=$chambre->NumChambre?>" method="post">
            <label for="description">Type de confort :</label>
            <input class="form-control" type="text" name="description" id="description"
                   value="<?= $chambre->Description ?>" disabled>
            <input class="form-control" type="text" name="descriptionHidden" id="descriptionHidden"
                   value="<?= $chambre->Description ?>" hidden>
            <div class="row">
                <div class="col-6">
                    <label for="dateDebutReserv">Date de début de la réservation</label>
                    <input class="form-control" type="date" name="dateDebutReserv" id="dateDebutReserv" required>
                </div>
                <div class="col-6">
                    <label for="dateFinReserv">Date de Fin de la réservation</label>
                    <input class="form-control" type="date" name="dateFinReserv" id="dateFinReserv" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-primary">Réserver</button>
            </div>
        </form>
    <?php endforeach; ?>
</div>
</body>
<?php require "script.html.php" ?>
</html>
