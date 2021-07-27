<?php

namespace src\core;

class Controller
{
    public $model;
    public $view;
    protected $pageData = array();

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
        $this->beforeAction();
    }

    public function beforeAction()
    {
    }

    public function redirect($adr)
    {
        header("Location: $adr");
    }
}