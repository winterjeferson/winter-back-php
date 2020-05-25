<?php

namespace Model\Admin;

class Login
{
    private $folderView = 'admin';

    public function __construct()
    {
    }

    function build()
    {
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/login.php';
    }
}
