<!doctype html>
<html lang="en">
<?php require "head.html.php"?>
<body>
<?php require "navbar.html.php"?>
<div class="container">
    <div>Nom de l'hotel : <?= $hotel->NomHotel ?></div>
    <div>Adresse de l'hotel : <?= $hotel->AdresseHotel ?> <?= $hotel->CodePostalHotel ?> <?= $hotel->VilleHotel ?></div>
    <div>Téléphone de l'hotel : <?= $hotel->TelHotel ?></div>
    <a href="<?= $path ?>/hotel/<?=$hotel->NumHotel?>/chambre">Passer une reservation</a>
</div>
</body>
<?php require "script.html.php" ?>
</html>
