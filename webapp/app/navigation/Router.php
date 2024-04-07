<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('login', new Route('/login', ['_controller' => 'App\Controller\LoginController::login']));
$routes->add('register', new Route('/register', ['_controller' => 'App\Controller\RegisterController::register']));
$routes->add('profile', new Route('/profile', ['_controller' => 'App\Controller\ProfileController::showProfile']));

return $routes;
?>