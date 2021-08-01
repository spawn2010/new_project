<?php

namespace src\Core;
class Controller
{
    public Controller $table;

    public Model $model;

    public View $view;

    protected array $pageData = array();

    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
        $this->beforeAction();
    }

<<<<<<< HEAD:src/core/Controller.php
    public function beforeAction (): void
    {
    }

    public function redirect ($adr): void
=======
    public function beforeAction()
    {
    }

    public function redirect($adr)
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80:src/Core/Controller.php
    {
        header("Location: $adr");
    }
}