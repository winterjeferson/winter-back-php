<?php

class Route
{
    private $route = [];
    private $fileExtension = '.php';
    private $controller = '';
    private $folderController = '';

    function __construct()
    {
        $this->folderController = $GLOBALS['globalFolderController'];
    }

    function build()
    {
        $this->buildLocation();
        $this->explodeUrl();
        $this->validateController();
        return $this->validateRoute();
    }

    function buildLocation()
    {
        $url = $_SERVER['REQUEST_URI'];
        $lastCharacter = substr($url, -1);

        if ($lastCharacter !== '/') {
            header('Location: ' . $url . '/');
        }
    }

    function explodeUrl()
    {
        $queryString =  $_SERVER['QUERY_STRING'];
        $explode = explode('/', $queryString);
        $arrClean = [];

        foreach ($explode as $key => &$value) {
            if ($key !== 0 && $value !== '') {
                $arrClean[] =  $value;
            }
        }

        if ($arrClean === []) {
            $arrClean[] =  'home';
        }

        $this->route = $arrClean;
    }

    function validateController()
    {
        $file = ucfirst($this->route[0]);

        if (file_exists($this->folderController . '/' . $file . $this->fileExtension)) {
            $this->controller = $file;
        }
    }

    function validateRoute()
    {
        if ($this->controller === '') {
            return $this->build404();
        } else {
            return $this->buildClass();
        }
    }

    function buildClass()
    {
        require $this->folderController . '/' . $this->controller .  $this->fileExtension;
        $class = ucfirst($this->folderController) . '\\' . $this->controller;
        $objController = new $class();
        $method = 'build' . ucfirst($this->route[count($this->route) - 1]);

        if (method_exists($objController, $method)) {
            return $objController->$method();
        } else {
            return $this->build404();
        }
    }

    function build404()
    {
        return require $GLOBALS['globalFolderView'] . '/404' . $this->fileExtension;
    }
}
