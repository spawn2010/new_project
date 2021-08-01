<?php

<<<<<<< HEAD
namespace src\Core;
=======
namespace Core;
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80

use Exception;

class Router
{

<<<<<<< HEAD
    public static function buildRoute (): void
=======
    public static function buildRoute()
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
    {
        $controllerName = "UserController";
        $action = "index";
        $route = explode("/", $_SERVER['REQUEST_URI']);
        if ($route[1] !== '') {
            $controllerName = ucfirst($route[1] . "Controller");
        }
        if (isset($route[2]) && $route[2] !== '') {
            $action = $route[2];
        }
<<<<<<< HEAD
         $controllerName = 'src\Controller\\' . $controllerName;
=======
        $controllerName = 'Controller\\' . $controllerName;
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
        try {
            $controller = new $controllerName();
            $controller->$action();
        } catch (Exception $exception) {
<<<<<<< HEAD
            (new self)->ErrorPage404();
        }
    }

    public function ErrorPage404 (): void
    {
        $host = 'https://' . $_SERVER['HTTP_HOST'] . '/';
=======
            self::ErrorPage404();
        }
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
        var_dump(explode("/", $_SERVER['REQUEST_URI']));
    }
}