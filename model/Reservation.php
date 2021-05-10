<?php
namespace Valarep\model;

use PDO;

class Reservation{
    public $CodeClient;
    public $NumChambre;
    public $DateDebutReserv;
    public $DateFinReserv;

    public function makeReservation(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO reserver(CodeClient,NumChambre,DateDebutReserv,DateFinReserv) VALUES (:CodeClient,:NumChambre,:DateDebutReserv,:DateFinReserv);";
        $sth = $dbh->prepare($query);
        $sth->bindParam(':CodeClient', $this->CodeClient);
        $sth->bindParam(':NumChambre', $this->NumChambre);
        $sth->bindParam(':DateDebutReserv', $this->DateDebutReserv);
        $sth->bindParam(':DateFinReserv',$this->DateFinReserv);
        $sth->execute();
        databaseConnexion::close();
    }

    public function getReservationByClients(){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM reserver as a JOIN chambre as b ON a.NumChambre = b.NumChambre JOIN hotel as c ON b.NumHotel = c.NumHotel WHERE a.CodeClient = :Client;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(':Client', $this->CodeClient);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Reservation");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }

    public function getReservationByHotel(){
        $dbh = databaseConnexion::open();
        $query = "SELECT a.NumChambre, a.DateDebutReserv, a.DateFinReserv, d.NomClient, d.PrenomClient FROM reserver as a JOIN chambre as b ON a.NumChambre = b.NumChambre JOIN hotel as c ON b.NumHotel = c.NumHotel JOIN client as d ON d.CodeClient = a.CodeClient WHERE c.NumHotel = :Hotel;";
        $sth = $dbh->prepare($query);
        $sth->bindParam('Hotel', $_SESSION['user']->NumHotel);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\Reservation");
        $items = $sth->fetchAll();
        databaseConnexion::close();
        return $items;
    }
}
