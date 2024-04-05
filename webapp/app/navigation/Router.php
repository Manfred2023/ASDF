<?php
// Router.php

class Router {
    private $routes = [];
 
    public function addRoute($url, $action) {
        $this->routes[$url] = $action;
    }
 
    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        if (array_key_exists($url, $this->routes)) {
            $action = $this->routes[$url];
            $this->callAction($action);
        } else { 
            echo 'Erreur 404 - Page non trouvée';
        }
    }
 
    private function callAction($action) { 
        list($controllerName, $methodName) = explode('@', $action);
         
        require $controllerName . '.man';
 
        $controller = new $controllerName();
 
        $controller->$methodName();
    }
}
?>
