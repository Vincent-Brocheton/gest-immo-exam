<!DOCTYPE html>
<html lang="fr">
<?php require "head.html.php" ?>
<body>
    <?php require "navbar.html.php" ?>
    <div class="container">
    <form class="form-group" id="choice">
        <label for="typeUser">Êtes-vous :</label>
        <select class="form-control" name="typeUser" id="typeUser">
            <option></option>
            <option value="client">Client</option>
            <option value="hotel">Hôtel</option>
        </select>
        <button class="btn btn-primary">Choisir</button>
    </form>
    <div id="client" style="display: none;">
        <?php require "clientRegister.html.php" ?>
    </div>
    <div id="hotel" style="display: none;">
        <?php require "hotelRegister.html.php" ?>
    </div>
    
    
    </div>
</body>
<script>
 let choose = document.querySelector("#choice");

 choose.addEventListener("submit", e => {
     e.preventDefault();
     let choice = document.getElementById("typeUser");
     console.log(choice.options[choice.selectedIndex].value);
     let value = choice.options[choice.selectedIndex].value;
     console.log(value);
     if(value==="client"){
         document.getElementById('client').style.display = 'block';
         document.getElementById('hotel').style.display = 'none';
     }else if(value==='hotel'){
         document.getElementById('client').style.display = 'none';
         document.getElementById('hotel').style.display = 'block';
     }
 })
</script>
<?php require "script.html.php" ?>
</html>