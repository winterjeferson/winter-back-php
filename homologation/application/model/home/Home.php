<?php

namespace Model\Home;

class Home
{
    private $folderView = 'home';

    public function __construct()
    {
    }

    function build()
    {
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/home.php';
    }
}
