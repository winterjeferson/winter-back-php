<?php

namespace Model\Admin;

// require __DIR__ . '../Main.php';

class Login
// class Login extends Main
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
