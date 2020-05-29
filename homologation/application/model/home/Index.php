<?php

namespace Application\Model\Home;

// require ../Main.php;

// class Index extends Main
class Index
{
    private $folderView = 'home';

    public function __construct()
    {
    }

    function build()
    {
        // $this->loadView(['folder' => 'home', 'file' => 'home']);
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/home.php';
    }
}
