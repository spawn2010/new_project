<?php

namespace app\Core;

class Router
{
    public static function buildRoute(): void
    {
        $controllerName = "UserController";
        $action = "index";
        $route = explode("/", $_SERVER['REQUEST_URI']);
        if ($route[1] !== '') {
            $controllerName = ucfirst($route[1] . "Controller");
        }
        if (isset($route[2]) && $route[2] !== '') {
            ;
            $action = $route[2];
        }
        $controllerName = 'app\Controller\\' . $controllerName;
        try {
            $controller = new $controllerName();
            $controller->$action();
        } catch (\Throwable $exception) {
            var_dump($exception . '<br>');
            (new self)->ErrorPage404();
        }
    }

    public function ErrorPage404(): void
    {
        $host = 'https://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}