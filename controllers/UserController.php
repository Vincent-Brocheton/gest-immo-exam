<?php
namespace Valarep\controllers;

use Exception;
use Valarep\model\Client;
use Valarep\model\Hotel;
use Valarep\model\User;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class UserController{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/login", "UserController", "login"));
        $router->addRoute(new Route("/register", "UserController", "register"));
        $router->addRoute(new Route("/register/hotel", "UserController", "hotelRegistration"));
        $router->addRoute(new Route("/register/client", "UserController", "clientRegistration"));
        $router->addRoute(new Route("/logout", "UserController", "logout"));
        $router->addRoute(new Route("/connect", "UserController", "connect"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public function login(){
        View::setTemplate('login');
        View::bindVariable('title', 'Connectez-Vous');
        View::display();
    }

    public function register(){
        View::setTemplate('register');
        View::bindVariable('title', 'Enregistrez-vous');
        View::display();
    }

    public function logout(){
        unset($_SESSION['user']);
        
        $router = new Router();

        $path =  $router->getBasePath();

        header("location: {$path}/");
    }

    public function hotelRegistration(){
        $user = new User;
        $user->email = $_POST['emailHotel'];
        $user->password = $_POST['passwordHotel'];
        $user->role = 'HOTEL';
        $user->insertUser();

        $recup = new User;
        $loginUser = $recup->recupUser($_POST['emailHotel'], $_POST['passwordHotel']);

        $hotel = new Hotel;
        $hotel->NomHotel = $_POST['nomHotel'];
        $hotel->AdresseHotel = $_POST['adresseHotel'];
        $hotel->CodePostalHotel = $_POST['codePostalHotel'];
        $hotel->VilleHotel = $_POST['villeHotel'];
        $hotel->TelHotel = $_POST['phoneHotel'];
        $hotel->id_user = $loginUser->id_user;
        $hotel->insertHotel();

        $router = new Router();

        $path =  $router->getBasePath();

        header("location: {$path}/");
    }

    public function clientRegistration(){
        $user = new User;
        $user->email = $_POST['emailClient'];
        $user->password = $_POST['passwordClient'];
        $user->role = 'CLIENT';
        $user->insertUser();
        
        $loginUser = new User; 
        $loginUsers = $loginUser->recupUser($_POST['emailClient'],$_POST['passwordClient']);

        $client = new Client;
        $client->NomClient = $_POST['nomClient'];
        $client->PrenomClient = $_POST['prenomClient'];
        $client->AdresseClient = $_POST['adresseClient'];
        $client->CodePostalClient = (int)$_POST['codePostalClient'];
        $client->VilleClient = $_POST['villeClient'];
        $client->PaysClient = $_POST['PaysClient'];
        $client->TelClient = $_POST['phoneClient'];
        $client->id_user = (int)$loginUsers->id_user;
        $client->insertClient();

        $router = new Router();

        $path =  $router->getBasePath();

        header("location: {$path}/");
    }

    public function connect(){
        try {
            $login = new User;
            $loginUser = $login->recupUser($_POST['email'], $_POST['password']);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        if($loginUser->role === "CLIENT"){
            try {
                $client = new Client;
                $client->id_user = $loginUser->id_user;
                $_SESSION['user'] = $client->connect();
                $router = new Router();

                $path =  $router->getBasePath();

                header("location: {$path}/");
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }else if($loginUser->role === "HOTEL"){
            try {
                $hotel = new Hotel;
                $hotel->id_user = $loginUser->id_user;
                $_SESSION['user'] = $hotel->connect();
                $router = new Router();

                $path =  $router->getBasePath();

                header("location: {$path}/");
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }
    }
}