<?php

namespace Application\Model\Admin;

// require __DIR__ . '../Main.php';

// class Login extends Main
class Login
{
    private $folderView = 'admin';

    public function __construct()
    {
    }

    function build()
    {
        // $this->loadView(['folder' => 'home', 'admin' => 'login']);
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/login.php';
    }
}
