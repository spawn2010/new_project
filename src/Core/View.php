<?php

namespace app\Core;
class View
{

    public array $tpl = [];

    public function render ($tpl, $pageData): void
    {
        include ROOT . $tpl;
    }
}