<?php
namespace Valarep;

// début de l'application web
// Chargement automatique des classes
require_once "vendor/autoload.php";
session_start();

$router = new Router();
$router->addRoute(new Route("/", "HomeController"));
$router->addRoute(new Route("/home", "HomeController"));
$router->addRoute(new Route("/login", "UserController"));
$router->addRoute(new Route("/connect", "UserController"));
$router->addRoute(new Route("/register", "UserController"));
$router->addRoute(new Route("/register/hotel", "UserController"));
$router->addRoute(new Route("/register/client", "UserController"));
if(isset($_SESSION['user'])){
    $router->addRoute(new Route("/logout", "UserController"));
    if($_SESSION['user']->role === "HOTEL"){
        $router->addRoute(new Route("/new", "HotelController"));
        $router->addRoute(new Route("/add", "HotelController"));
        $router->addRoute(new Route("/all", "HotelController"));
        $router->addRoute(new Route("/reservations", "HotelController"));
    } elseif ($_SESSION['user']->role === "CLIENT"){
        $router->addRoute(new Route("/hotels", "ClientController"));
        $router->addRoute(new Route("/hotel/{*}", "ClientController"));
        $router->addRoute(new Route("/all", "ClientController"));
        $router->addRoute(new Route("/reserved/{*}", "ClientController"));
    }
}

$route = $router->findRoute();

if ($route)
{
    $route->execute();
}
else
{
    // Erreur 404
    echo "Page not found";
}
