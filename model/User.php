<?php
namespace Valarep\model;

use Exception;
use PDO;

class User{
    public $id_user;
    public $email;
    public $password;
    public $role;
    
    public function insertUser(){
        $dbh = databaseConnexion::open();
        $query = "INSERT INTO utilisateur(email, password, role)
        VALUES (:email,:password,:role)";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":email", $this->email);
        $sth->bindParam(":password", $this->password);
        $sth->bindParam(":role", $this->role);
        $sth->execute();
        databaseConnexion::close();
    }

    public function recupUser(string $email, string $password){
        $dbh = databaseConnexion::open();
        $query = "SELECT * FROM utilisateur WHERE email= :email AND password = :password;";
        $sth = $dbh->prepare($query);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":password", $password);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, "Valarep\\model\\User");
        $item = $sth->fetch();
        if(!$item){
            throw new Exception("L'utilisateur n'existe pas");
        }
        databaseConnexion::close();
        return $item;
    }
}