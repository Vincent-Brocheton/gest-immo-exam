<?php
namespace Valarep\controllers;

use Valarep\model\Client;
use Valarep\Route;
use Valarep\Router;
use Valarep\View;

class UserController{
    public static function route(){
        $router = new Router();
        $router->addRoute(new Route("/login", "UserController", "login"));
        $router->addRoute(new Route("/register", "UserController", "register"));
        $router->addRoute(new Route("/logout", "UserController", "logout"));
        
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
    }
}