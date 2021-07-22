<?php

class Routing
    {
    public static function buildRoute()
        {
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "index";
        $route = explode("/", $_SERVER['REQUEST_URI']);
        if ($route[1] != '')
            {
            $controllerName = ucfirst($route[1] . "Controller");
            $modelName = ucfirst($route[1] . "Model");
            }
        if (isset($route[2]) && $route[2] != '')
            {
            $action = $route[2];
            }
        $controller_path = CONTROLLER_PATH . $controllerName . ".php";
        $model_path = MODEL_PATH . $modelName . ".php";
        if (file_exists($controller_path) && file_exists($model_path))
            {
            require_once $controller_path;
            require_once $model_path;
            $controller = new $controllerName();
            $controller->$action();
            } else
            {
            Routing::ErrorPage404();
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
