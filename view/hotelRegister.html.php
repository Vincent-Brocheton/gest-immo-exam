<form action="<?= $path ?>/register/hotel" method="POST">
    <fieldset class="offset-3 col-6 my-2">
        <legend>Enregistrez votre hôtel</legend>
        <div>
            <label for="nomHotel">Nom de l'hôtel :</label>
            <input class="form-control" type="text" name="nomHotel" id="nomHotel">
        </div>
        <div>
            <label for="emailHotel">Votre Email :</label>
            <input class="form-control" type="email" name="emailHotel" id="emailHotel">
        </div>
        <div>
            <label for="passwordHotel">Votre Mot de passe :</label>
            <input class="form-control" type="password" name="passwordHotel" id="passwordHotel">
        </div>
        <div>
            <label for="adresseHotel">Adresse de l'hôtel :</label>
            <input class="form-control" type="text" name="adresseHotel" id="adresseHotel">
        </div>
        <div>
            <label for="codePostalHotel">Code Postal de l'hôtel :</label>
            <input class="form-control" type="text" name="codePostalHotel" id="codePostalHotel">
        </div>
        <div>
            <label for="villeHotel">Ville de l'hôtel :</label>
            <input class="form-control" type="text" name="villeHotel" id="villeHotel">
        </div>
        <div>
            <label for="phoneHotel">Numéro de téléphone de l'hôtel :</label>
            <input class="form-control" type="text" name="phoneHotel" id="phoneHotel">
        </div>
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-primary">Envoyer</button>
        </div>
    </fieldset>
</form>