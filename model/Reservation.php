<?php
namespace Valarep\model;

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
}
