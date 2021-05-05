<?php
namespace Valarep\model;

use Exception;
use PDO;

class Client extends User{
    public $CodeClient;
    public $NomClient;
    public $PrenomClient;
    public $AdresseClient;
    public $CodePostalClient;
    public $VilleClient;
    public $PaysClient;
    public $TelClient;

    public function insertClient(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO client(NomClient, PrenomClient, AdresseClient, CodePostalClient,VilleClient, PaysClient, TelClient, id_user) VALUES (:NomClient,:PrenomClient,:AdresseClient,:CodePostalClient,:VilleClient,:PaysClient,:TelClient,:id_user);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":NomClient", $this->NomClient);
        $sth->bindParam(":PrenomClient", $this->PrenomClient);
        $sth->bindParam(":AdresseClient", $this->AdresseClient);
        $sth->bindParam(":CodePostalClient", $this->CodePostalClient);
        $sth->bindParam(":VilleClient", $this->VilleClient);
        $sth->bindParam(":PaysClient", $this->PaysClient);
        $sth->bindParam(":TelClient", $this->TelClient);
        $sth->bindParam(":id_user", $this->id_user);
        $sth->execute();
        databaseConnexion::close();
    }

    public function connect(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM client as a JOIN utilisateur as b ON a.id_user = b.id_user;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":id_user", $this->id_user);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Client");
        $item = $sth->fetch();
        if(!$item){
            throw new Exception("L'Hotel n'existe pas");
        }
        databaseConnexion::close();
        return $item;
    }
}