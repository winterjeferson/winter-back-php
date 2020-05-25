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

    function build($class)
    {
        $obj = new $class();
        $obj->build();
    }

    function buildHome()
    {
        $class = $this->namespace . 'Home';
        require $this->folderAddress . '/Home.php';
        $this->build($class);
    }
}
