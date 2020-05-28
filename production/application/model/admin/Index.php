<?php

namespace Model\Admin;

// require __DIR__ . '../Main.php';

// class Index extends Main
class Index
{
    private $folderView = 'admin';

    public function __construct()
    {
    }

    function build()
    {
        // $this->loadView(['folder' => 'home', 'admin' => 'wellcome']);
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/wellcome.php';
    }
}
