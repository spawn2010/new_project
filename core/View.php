<?php
class View
{
    public $tpl = [];
    public function render($tpl, $pageData)
    {
        include ROOT . $tpl;
    }
}