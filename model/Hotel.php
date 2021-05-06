<?php
namespace Valarep\model;

use Exception;
use PDO;

class Hotel extends User{
    public $NumHotel;
    public $NomHotel;
    public $AdresseHotel;
    public $CodePostalHotel;
    public $VilleHotel;
    public $TelHotel;

    public function insertHotel(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO hotel(NomHotel, AdresseHotel, CodePostalHotel, VilleHotel, TelHotel, id_user) VALUES (:NomHotel,:AdresseHotel,:CodePostalHotel,:VilleHotel,:TelHotel,:id_user);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":NomHotel", $this->NomHotel);
        $sth->bindParam(":AdresseHotel", $this->AdresseHotel);
        $sth->bindParam(":CodePostalHotel", $this->CodePostalHotel);
        $sth->bindParam(":VilleHotel", $this->VilleHotel);
        $sth->bindParam(":TelHotel", $this->TelHotel);
        $sth->bindParam(":id_user", $this->id_user);
        $sth->execute();
        databaseConnexion::close();
    }

    public function connect(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM hotel as a JOIN utilisateur as b ON a.id_user = b.id_user;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_user", $this->id_user);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Hotel");
        $item = $sth->fetch();
        if(!$item){
            throw new Exception("L'Hotel n'existe pas");
        }
        databaseConnexion::close();
        return $item;
    }

    public function getAll(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM hotel;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Hotel");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }
}