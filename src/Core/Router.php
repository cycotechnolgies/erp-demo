<?php

namespace Core;

class Router
{
    public static function dispatch()
    {
        $controllerName = $_GET['controller'] ?? 'home';
        $action = $_GET['action'] ?? 'index';

        $controllerClass = "Controllers\\" . ucfirst($controllerName) . "Controller";

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Controller not found: $controllerName";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            http_response_code(404);
            echo "Action not found: $action";
            return;
        }

        $controller->$action();
    }
}
