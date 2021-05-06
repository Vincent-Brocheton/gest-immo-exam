<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>
<body>
<?php require "navbar.html.php" ?>
<div class="container mt-4">
    <div class="d-flex flex-wrap">
        <?php foreach ($hotels as $hotel): ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $hotel->NomHotel ?></h5>
                    <p class="card-text"><?= $hotel->AdresseHotel ?> <?= $hotel->CodePostalHotel ?> <?= $hotel->VilleHotel ?>
                    </p>
                    <a href="<?= $path ?>/hotel/<?= $hotel->NumHotel?>" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
<?php require "script.html.php" ?>
</html>
