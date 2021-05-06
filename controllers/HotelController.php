<?php 
namespace Valarep\controllers;

use Valarep\model\Categorie;
use Valarep\model\Chambre;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class HotelController {
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/new", "HotelController", "newChambre"));
        $router->addRoute(new Route("/add", "HotelController", "addChambre"));
        $router->addRoute(new Route("/see", "HotelController", "seeChambre"));
        $router->addRoute(new Route("/reservations", "HotelController", "reservedChambre"));

        $route = $router->findRoute();

        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function reservedChambre(){

    }

    public static function seeChambre(){

    }

    public static function newChambre(){
        $categories = new Categorie;
        $allCategories = $categories->getAll();
        View::setTemplate('addChambre');
        View::bindVariable('title', "Ajouter une chambre");
        View::bindVariable('categories',$allCategories);
        View::display();
    }

    public static function addChambre(){
        var_dump($_POST);
        $chambre = new Chambre;
        $chambre->TelChambre = $_POST['phoneChambre'];
        $chambre->NumHotel = $_SESSION['user']->NumHotel;
        $chambre->CodeCategorie = $_POST['categorieChambre'];
        $chambre->add();

        $router = new Router();

        $path = $router->getBasePath();

        header("location: {$path}/");
    }
}
