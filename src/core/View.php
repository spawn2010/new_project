<?php

namespace src\core;
class View
{
    public $tpl = [];

    public function render($tpl, $pageData)
    {
        include ROOT . $tpl;
    }
}