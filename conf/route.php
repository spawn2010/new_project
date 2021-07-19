<?php

class Routing
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

        if (empty($_SESSION['user']) or $_SESSION['user'] != 'user 1' or $_SESSION['user'] != 'user 2') {
            $controllerName = "IndexController";
            $modelName = "IndexModel";
            $action = "index";
        }
        if ($_SESSION['user'] == 'user 1') {
            $controllerName = "UserController";
            $modelName = "UserModel";
            $action = "index";
        }
        if ($_SESSION['user'] == 'user 2') {
            $controllerName = "AdminController";
            $modelName = "AdminModel";
            $action = "index";
        }
        require_once CONTROLLER_PATH . $controllerName . ".php";
        require_once MODEL_PATH . $modelName . ".php";
        $controller = new $controllerName();
        $controller->$action();

    }
}
