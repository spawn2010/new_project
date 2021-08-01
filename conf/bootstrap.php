<?php
//определение констант
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const CONTROLLER_PATH = ROOT . "/Controller/";
const MODEL_PATH = ROOT . "/Model/";
const VIEW_PATH = ROOT . "/Views/";

require_once 'C:\OpenServer\domains\mvc\vendor\autoload.php';

/*
spl_autoload_register(

  static function ($class) {
      echo '<br>';
      echo $class;
      echo '<br>';
     $filePath = ROOT  .'/'. $class . '.php';
    $filePath = str_replace('\\', '/', $filePath);

    if (is_file($filePath)) {

        require_once $filePath;
    } else {
        throw new Exception('Класс не найден');
    }
});
*/

src\Core\Router::buildRoute();


