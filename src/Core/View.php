<?php

namespace src\Core;
class View
{

    public array $tpl = [];

<<<<<<< HEAD:src/core/View.php
    public function render ($tpl, $pageData): void
=======
    public function render($tpl, $pageData)
>>>>>>> 79e5ddc11381ed2e26f345236adaa9834e89cf80:src/Core/View.php
    {
        include ROOT . $tpl;
    }
}