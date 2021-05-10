<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">Gest'Immo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= $path ?>/">Accueil</a>
            </li>
            <?php if (isset($_SESSION['user'])): ?>
                <?php if ($_SESSION['user']->role === "CLIENT"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>/hotels">Reserver une chambre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>/all">Voir mes reservations</a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['user']->role === "HOTEL"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>/new">Ajouter une chambre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>/reservations">Voir les reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $path ?>/all">Voir les Chambres</a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="<?= $path ?>/logout" class="btn btn-danger mr-2">Deconnexion</a>
        <?php elseif (!isset($_SESSION['user'])) : ?>
            <a href="<?= $path ?>/login" class="btn btn-primary mr-2">Login</a>
            <a href="<?= $path ?>/register" class="btn btn-warning">Vous inscrire</a>
        <?php endif; ?>
    </div>
</nav>
