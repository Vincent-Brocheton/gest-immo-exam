<?php
namespace Valarep;

// début de l'application web

// Chargement automatique des classes
require_once "vendor/autoload.php";

$router = new Router();
$router->addRoute(new Route("/", "HomeController"));
$router->addRoute(new Route("/home", "HomeController"));

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
