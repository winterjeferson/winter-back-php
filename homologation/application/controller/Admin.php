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

    function build()
    {
        $class = $this->namespace . 'Index';
        require $this->folderAddress . '/Index.php';
        $this->view($class);
    }

    function buildLogin()
    {
        $class = $this->namespace . 'Login';
        require $this->folderAddress . '/Login.php';
        $this->view($class);
    }

    function view($class)
    {
        $obj = new $class();
        $obj->build();
    }
}
