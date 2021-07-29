<?php

namespace Core;

use Exception;

class Router
{

    public static function buildRoute()
    {
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";
        $route = explode("/", $_SERVER['REQUEST_URI']);
        if ($route[1] != '') {
            $controllerName = ucfirst($route[1] . "Controller");
            $modelName = ucfirst($route[1] . "Model");
        }
        if (isset($route[2]) && $route[2] != '') {
            $action = $route[2];
        }
        $controllerName = 'Controller\\' . $controllerName;
        try {
            $controller = new $controllerName();
            $controller->$action();
        } catch (Exception $exception) {
            self::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
        var_dump(explode("/", $_SERVER['REQUEST_URI']));
    }
}