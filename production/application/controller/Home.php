<?php

namespace Controller;

class Home
{
    private $folder = 'home';
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

    function view($class)
    {
        $obj = new $class();
        $obj->build();
    }
}
