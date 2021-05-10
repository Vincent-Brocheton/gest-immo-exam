<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>
<body>
    <?php require "navbar.html.php"?>
    <div class="jumbotron">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Nom du Client</th>
                    <th>Prénom du Client</th>
                    <th>Numéro de la chambre</th>
                    <th>Date de début de la réservation</th>
                    <th>Date de fin de la réservation</th>
                    <th>Etat de la réservation</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation->NomClient ?></td>
                    <td><?= $reservation->PrenomClient ?></td>
                    <td><?= $reservation->NumChambre ?></td>
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