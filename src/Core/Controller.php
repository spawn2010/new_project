<?php

namespace app\Core;

class Controller
{

    public View $view;

    protected array $pageData = array();

    public function __construct()
    {
        $this->view = new View();
        $this->beforeAction();
    }

    public function beforeAction(): void
    {
    }

    public function redirect($adr): void
    {
        header("Location: $adr");
    }
}