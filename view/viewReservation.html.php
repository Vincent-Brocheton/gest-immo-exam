<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>
<body>
    <?php require "navbar.html.php" ?>
    <div class="jumbotron">
    <table class="table table-stripped text-center">
        <thead>
            <tr>
                <th>Numéro de chambre</th>
                <th>Nom de l'hôtel</th>
                <th>Adresse de l'hôtel</th>
                <th>Date de début de réservation</th>
                <th>Date de fin de réservation</th>
                <th>Etat de la reservation</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($reservations as $reservation):?>
            <tr>
                <td><?= $reservation->NumChambre ?></td>
                <td><?= $reservation->NomHotel ?></td>
                <td><?= $reservation->AdresseHotel ?> <?= $reservation->CodePostalHotel ?> <?= $reservation->VilleHotel ?></td>
                <td><?= $reservation->DateDebutReserv ?></td>
                <td><?= $reservation->DateFinReserv ?></td>
                <td><?= $reservation->EtatReserv ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
</body>
<?php require "script.html.php" ?>
</html>