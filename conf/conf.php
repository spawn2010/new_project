<?php
//определение констант
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/controllers/");
define("MODEL_PATH", ROOT . "/models/");
define("VIEW_PATH", ROOT . "/views/");
//подключвение файлов
require_once("db.php");
require_once("route.php");
require_once 'core\Model.php';
require_once 'core\View.php';
require_once 'core\Controller.php';
Routing::buildRoute();