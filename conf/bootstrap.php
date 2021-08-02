<?php
//определение констант

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const CONTROLLER_PATH = ROOT . "/Controller/";
const MODEL_PATH = ROOT . "/Model/";
const VIEW_PATH = ROOT . "/Views/";

require_once ROOT.'/vendor/autoload.php';

app\Core\Router::buildRoute();


