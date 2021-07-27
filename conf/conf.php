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

       echo 'не найден '.$class.'.php<br>';
       // не понимаю почему при такой записи require подключается Controller.php
        // а при такой нет 'src/controllers/'.$class.'.php', как по мне он в принципе не должен подключаться потому что нигде я не увидел в коде чтобы создавался объект Controller
        require 'src/controllers/'.$class.'.php';
    }

    //  в чем проблема, почему не подключается IndexController...
    //  при этом подключение Router отрабатывает нормально.
    // есть подозрение что проблема в пространстве имен, но пробовал по разному через use ничего не вышло
/*
Что я виже в окне браузера с адресом mvc/
подключен - conf\Router.php
IndexController
не найден IndexController.php
подключен - src\core\Controller.php

Fatal error: Uncaught Error: Class 'IndexController' not found in C:\OpenServer\domains\mvc\conf\Router.php:28 Stack trace: #0 C:\OpenServer\domains\mvc\conf\conf.php(41): conf\Router::buildRoute() #1 C:\OpenServer\domains\mvc\index.php(5): require_once('C:\\OpenServer\\d...') #2 {main} thrown in C:\OpenServer\domains\mvc\conf\Router.php on line 28

*/


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


