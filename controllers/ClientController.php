<?php
namespace Valarep\controllers;

use Valarep\model\Hotel;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class ClientController{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/hotels", "ClientController", "viewHotels"));
        
        $route = $router->findRoute();

        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public static function viewHotels(){
        $hotel = new Hotel;
        $allHotels = $hotel->getAll();
        View::setTemplate("hotels");
        View::bindVariable('title', "Liste des hotels");
        View::bindVariable("hotels",$allHotels);
        View::display();
    }

}