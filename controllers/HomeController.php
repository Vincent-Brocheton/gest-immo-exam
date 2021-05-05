<?php
namespace Valarep\controllers;

use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class HomeController{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/", "HomeController", "home"));
        $router->addRoute(new Route("/home", "HomeController", "home"));
        
        $route = $router->findRoute();
        
        if($route){
            $route->execute();
        }else{
            echo "Page Not Found";
        }
    }

    public function home(){
        View::setTemplate('home');
        View::bindVariable('title', "Accueil");
        View::display();
    }
}