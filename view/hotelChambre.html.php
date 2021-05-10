<!DOCTYPE html>
<html lang="en">
<?php require "head.html.php"?>
<body>
    <?php require "navbar.html.php"?>
    <div class="container d-flex flex-wrap justify-content-between">
        <?php foreach($chambres as $chambre) :?>
            <div class="card mt-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $chambre->Description ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chambre->TelChambre ?></h6>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</body>
<?php require "script.html.php"?>
</html>