<form class="form-group" action="<?= $path ?>/register/client" method="POST">
    <fieldset class="offset-3 col-6 my-2">
        <legend>Enregistrez-Vous!</legend>
        <div>
            <label for="nomClient">Votre Nom :</label>
            <input class="form-control" type="text" name="nomClient" id="nomClient">
        </div>
        <div>
            <label for="prenomClient">Votre Prénom :</label>
            <input class="form-control" type="text" name="prenomClient" id="prenomClient">
        </div>
        <div>
            <label for="emailClient">Votre Email :</label>
            <input class="form-control" type="email" name="emailClient" id="emailClient">
        </div>
        <div>
            <label for="passwordClient">Votre Mot de passe :</label>
            <input class="form-control" type="password" name="passwordClient" id="passwordClient">
        </div>
        <div>
            <label for="adresseClient">Votre Adresse :</label>
            <input class="form-control" type="text" name="adresseClient" id="adresseClient">
        </div>
        <div>
            <label for="codePostalClient">Votre Code Postal :</label>
            <input class="form-control" type="text" name="codePostalClient" id="codePostalClient">
        </div>
        <div>
            <label for="villeClient">Votre Ville :</label>
            <input class="form-control" type="text" name="villeClient" id="villeClient">
        </div>
        <div>
            <label for="PaysClient">Votre Pays :</label>
            <input class="form-control" type="text" name="PaysClient" id="PaysClient">
        </div>
        <div>
            <label for="phoneClient">Votre Numéro de téléphone :</label>
            <input class="form-control" type="text" name="phoneClient" id="phoneClient">
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">Envoyer</button>
        </div>
    </fieldset>
</form>