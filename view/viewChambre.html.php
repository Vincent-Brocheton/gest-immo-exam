<!doctype html>
<html lang="en">
<?php require "head.html.php"?>
<body>
<?php require "navbar.html.php"?>
<div class="container">

    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Numéro de téléphone de la chambre</th>
                <th>Catégorie de la chambre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($chambres as $chambre):?>
            <tr>
                <td><?= $chambre->TelChambre ?></td>
                <td><?= $chambre->Description ?></td>
                <td>
                    <a href="<?= $path ?>/reserved/<?= $chambre->NumChambre ?>" class="btn btn-primary">Réserver</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
</body>
<?php require "script.html.php"?>
</html>
