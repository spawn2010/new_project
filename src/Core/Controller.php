<?php

namespace app\Core;
class Controller
{
    public Controller $table;

    public Model $model;

    public View $view;

    protected array $pageData = array();

    public function __construct ()
    {
        $this->view = new View();
        $this->model = new Model();
        $this->beforeAction();
    }

    public function beforeAction (): void
    {
    }

    public function redirect ($adr): void
    {
        header("Location: $adr");
    }
}