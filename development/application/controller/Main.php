<?php

namespace Application\Controller;

class Main
{
    public $namespace = '';
    public $folderAddress = '';

    public function __construct()
    {
    }

    public function loadModel($target)
    {
        $class = $this->namespace . $target;
        require $this->folderAddress . '/' . $target . '.php';
        $this->loadClass($class);
    }

    public function loadClass($class)
    {
        $obj = new $class();
        $obj->build();
    }

    public function updateAddress($folder)
    {
        $this->namespace = ucfirst($GLOBALS['globalFolderApplication']) . '\\' . ucfirst($GLOBALS['globalFolderModel']) . '\\' . ucfirst($folder) . '\\';
        $this->folderAddress = './' . $GLOBALS['globalFolderModel'] . '/' . $folder;
    }
}
