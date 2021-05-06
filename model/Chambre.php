<?php
namespace Valarep\model;

use Exception;

class Chambre{
    public $NumChambre;
    public $TelChambre;
    public $NumHotel; // id de l'hôtel
    public $CodeCategorie; // id de la catégorie

    public function add(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO chambre(TelChambre,NumHotel,CodeCategorie) VALUES (:TelChambre,:NumHotel,:CodeCategorie);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":TelChambre", $this->TelChambre);
        $sth->bindParam(":NumHotel", $this->NumHotel);
        $sth->bindParam(":CodeCategorie", $this->CodeCategorie);
        $affect = $sth->execute();
        if(!$affect){
            throw new Exception("L'insertion en base de données ne s'est pas effectuée");
        }
        databaseConnexion::close();

    }

    public function getAll(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM chambre as a JOIN categorie as b ON a.CodeCategorie = b.CodeCategorie WHERE NumHotel = :NumHotel;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(':NumHotel', $this->NumHotel);
        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS, "Valarep\\model\\Chambre");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }
}
