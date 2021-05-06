<?php
namespace Valarep\controllers;

use Valarep\model\Chambre;
use Valarep\model\Hotel;
use Valarep\model\Reservation;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class ClientController{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/hotels", "ClientController", "viewHotels"));
        $router->addRoute(new Route("/hotel/{id}/chambre", "ClientController", "viewChambre"));
        $router->addRoute(new Route("/hotel/{id}", "ClientController", "viewHotel"));
        $router->addRoute(new Route("/all", "ClientController", "viewReservations"));
        $router->addRoute(new Route("/reserved/{id}", "ClientController", "acceptReservations"));

        $route = $router->findRoute();

        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function viewChambre($id){
        $chambre = new Chambre;
        $chambre->NumHotel = $id;
        $allChambre = $chambre->getAll();
        View::setTemplate('viewChambre');
        View::bindVariable('title', "Nos Chambres");
        View::bindVariable('chambres', $allChambre);
        View::display();
    }

    public static function acceptReservations($id){
        $reservation = new Reservation;
        $reservation->CodeClient = $_SESSION['user']->CodeClient;
        $reservation->NumChambre = $id;
        $reservation->makeReservation();
    }

    public static function viewHotel($id){
        $hotel = new Hotel;
        $hotel->NumHotel = $id;
        $thisHotel = $hotel->getHotel();
        View::setTemplate('viewHotel');
        View::bindVariable('title', $thisHotel->NomHotel);
        View::bindVariable('hotel', $thisHotel);
        View::display();
    }

    public static function viewHotels(){
        $hotel = new Hotel;
        $allHotels = $hotel->getAll();
        View::setTemplate("hotels");
        View::bindVariable('title', "Liste des hotels");
        View::bindVariable("hotels",$allHotels);
        View::display();
    }

    public static function viewReservations(){

    }

}
