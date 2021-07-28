<?php
//определение констант
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/src/Controller/");
define("MODEL_PATH", ROOT . "/src/Model/");
define("VIEW_PATH", ROOT . "/src/views/");
spl_autoload_register(function ($class) {
    $filePath = ROOT . '/src/' . $class . '.php';
    $filePath = str_replace('\\', '/', $filePath);
    //  require_once $filePath;
    if (is_file($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception('Класс не найден');
    }
});
core\Router::buildRoute();


