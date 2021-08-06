<?php

namespace app\Core;

class View
{
    public function render($tpl, $pageData): void
    {
        include ROOT . $tpl;
    }
}