<?php
// Created by Manfred MOUKATE on 09/04/2024 23:52,
// Email moukatemanfred@gmail.com
// Copyright (c) 2024. All rights reserved.
// Last modified 09/04/2024 23:52
class Router
{
    private $handled = false;

    public function get($route, $screen)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === $route) {
            $this->handled = true;
            return include_once(screen . $screen);
        }
    }

    public function post($route, $screen)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return false;
        }
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri === $route) {
            $this->handled = true;
            return include_once(screen . $screen);
        }
    }

    public function __destruct()
    {
        if (!$this->handled) {
            return include_once(screen . '404/404.php');
        }
    }
}


