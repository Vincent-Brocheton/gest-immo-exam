<?php 
namespace Valarep\controllers;

use Valarep\model\Categorie;
use Valarep\model\Chambre;
use Valarep\model\Reservation;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class HotelController {
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/new", "HotelController", "newChambre"));
        $router->addRoute(new Route("/add", "HotelController", "addChambre"));
        $router->addRoute(new Route("/all", "HotelController", "allChambre"));
        $router->addRoute(new Route("/reservations", "HotelController", "reservedChambre"));

        $route = $router->findRoute();

        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function allChambre(){
        $chambres = new Chambre;
        $chambres->NumHotel = $_SESSION['user']->NumHotel;
        $allChambres = $chambres->getAll();
        View::setTemplate('hotelChambre');
        View::bindVariable('title', "Vos chambres");
        View::bindVariable('chambres', $allChambres);
        View::display();
    }

    public static function reservedChambre(){
        $reservation = new Reservation;
        $allReservations = $reservation->getReservationByHotel();
        $today = date('d/m/Y');
        foreach($allReservations as $reservation){
            $reservation->DateDebutReserv = date_create($reservation->DateDebutReserv);
            $reservation->DateDebutReserv = date_format($reservation->DateDebutReserv,'d/m/Y');
            $reservation->DateFinReserv = date_create($reservation->DateFinReserv);
            $reservation->DateFinReserv = date_format($reservation->DateFinReserv,'d/m/Y');
            if($today < $reservation->DateDebutReserv){
                $reservation->EtatReserv = "A venir";
            } elseif($today > $reservation->DateFinReserv){
                $reservation->EtatReserv = "Terminée";
            }else{
                $reservation->EtatReserv = "En Cours";
            }
        }
        View::setTemplate('reservByHotel');
        View::bindVariable('title', "Voir vos reservations");
        View::bindVariable('reservations', $allReservations);
        View::display();
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
