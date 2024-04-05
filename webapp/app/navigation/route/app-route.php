<?php


require '../Router.php';

$router = new Router();

// Définition des routes
$router->addRoute('/', 'index.php');
$router->addRoute('file:///Users/woupo/Documents/app2024/ASDF/webapp/screen/app/overview/overview.html', 'overview');
$router->addRoute('/contact', 'ContactController@index');

// Exécution du routeur
$router->dispatch();
?>
