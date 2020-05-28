<?php

namespace Model;

class Main
{
    public function __construct()
    {
    }

    function loadView($arr)
    {
        return require './' . $GLOBALS['globalFolderView'] . '/' . $arr['folder'] . '/' . $arr['file'] . '.php';
    }
}
