<?php


require '../Router.php';

$router = new Router();

// Définition des routes
$router->addRoute('/', 'index.php');
$router->addRoute('/overview', 'overview.php');
$router->addRoute('/contact', 'ContactController@index');

// Exécution du routeur
$router->dispatch();
?>
