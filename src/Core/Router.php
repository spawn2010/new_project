<?php

namespace app\Core;

use Exception;

class Router
{
    public static function buildRoute (): void
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
        //почему если поменять app на src перестает работать, файл же находится в каталоге \mvc\src\Controller\UserController.php
        //пространство имен переопределяет название каталогов для автолоадинга ?
        $controllerName = 'app\Controller\\' . $controllerName;
        try {
            $controller = new $controllerName();
            $controller->$action();
        } catch (Exception $exception) {
            //не работают исключения через autoload composer
            (new self)->ErrorPage404();
        }
    }

    public function ErrorPage404 (): void
    {
        $host = 'https://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
        var_dump(explode("/", $_SERVER['REQUEST_URI']));
    }
}