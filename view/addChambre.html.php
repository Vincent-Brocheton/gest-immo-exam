<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php" ?>
<body>
<?php require "navbar.html.php" ?>
    <div class="container">
        <form action="<?= $path ?>/add" method="post">
            <fieldset>
                <legend>Ajouter une chambre</legend>
                <div>
                    <label for="phoneChambre">Téléphone de la chambre :</label>
                    <input type="text" name="phoneChambre" id="phoneChambre">
                </div>
                <div>
                    <label for="categorieChambre">Catégorie de la chambre :</label>
                    <select name="categorieChambre" id="categorieChambre">
                        <?php foreach($categories as $categorie): ?>
                        <option value="<?= $categorie->CodeCategorie?>">
                            <?= $categorie->Description ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button>Ajouter</button>
                </div>
            </fieldset>
        </form>
    </div>
</body>
<?php require "script.html.php" ?>
</html>