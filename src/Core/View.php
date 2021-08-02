<?php

namespace app\Core;
class View
{
    public array $tpl = [];

    public function render ($tpl, $pageData): void
    {
        // не совсем понимаю на что ругается
        include ROOT . $tpl;
    }
}