<?php
namespace conf;

//определение констант
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/src/controllers/");
define("MODEL_PATH", ROOT . "/src/models/");
define("VIEW_PATH", ROOT . "/src/views/");

spl_autoload_register(function ($class) {

    if (is_file($class.'.php')){
        require $class.'.php';
        echo 'подключен - '.$class.'.php<br>';
    }else{
        echo 'src/controllers/'.$class.'.php<br>';
        require 'src/controllers/'.$class.'.php';
    }




});

//подключвение файлов
/*
require_once("db.php");
require_once("Router.php");
require_once 'src\core\Model.php';
require_once 'src\core\View.php';
require_once 'src\core\Controller.php';
*/


Router ::buildRoute();


