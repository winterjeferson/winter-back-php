<?php

namespace Controller;

class Admin
{
    private $folder = 'admin';
    private $folderAddress = '';
    private $namespace = '';

    public function __construct()
    {
        $this->namespace = ucfirst($GLOBALS['globalFolderModel']) . '\\' . ucfirst($this->folder) . '\\';
        $this->folderAddress = './' . $GLOBALS['globalFolderModel'] . '/' . $this->folder;
    }

    function build($class)
    {
        $obj = new $class();
        $obj->build();
    }

    function buildAdmin()
    {
        $class = $this->namespace . 'Admin';
        require $this->folderAddress . '/Admin.php';
        $this->build($class);
    }

    function buildLogin()
    {
        $class = $this->namespace . 'Login';
        require $this->folderAddress . '/Login.php';
        $this->build($class);
    }
}
