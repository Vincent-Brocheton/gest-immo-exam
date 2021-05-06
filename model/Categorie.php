<?php
namespace Valarep\model;

use Exception;
use PDO;

class Categorie {
    public $CodeCategorie;
    public $Description;

    public function getAll(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM categorie;";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Categorie");
        $items = $sth->fetchAll();
        if(count($items)!=3){
            throw new Exception("Il n'y a pas le bon nombre de catégories");
        }
        databaseConnexion::close();
        return $items;
    }
}