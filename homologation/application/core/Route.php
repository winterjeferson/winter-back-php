<?php

namespace Application\Core;

use  Application\Core\Session;

class Route
{
    private $arrUrl = [];

    public function __construct()
    {
    }

    public function build()
    {
        $objSession = new Session();
        $this->builArrUrl();
        $this->buildLocation();
        $this->setSession($objSession);

        $controllerDefault = $this->validateControllerDefault();
        if (!$controllerDefault) {
            $this->build404();
            return;
        }

        $isController = $this->buildController($objSession->get('arrUrl'));
        if ($isController === false) {
            $this->build404();
            return;
        }
    }

    private function setSession($objSession)
    {
        $objSession->set('arrUrl', $this->arrUrl);
    }

    private function builArrUrl()
    {
        $explodeUrl = $this->explodeUrl();
        $arrUrl = [
            'main' => $GLOBALS['globalUrl'],
            'language' => isset($explodeUrl[0]) ? $explodeUrl[0] : '',
            'folder' => isset($explodeUrl[1]) ? $explodeUrl[1] : 'home',
            'controller' => isset($explodeUrl[2]) ? $explodeUrl[2] : '',
        ];

        $countExplode = count($explodeUrl);
        $countArrReturn = count($arrUrl);

        if ($countExplode >= $countArrReturn) {
            array_splice($explodeUrl, 0, $countArrReturn - 1);

            foreach ($explodeUrl as $key => &$value) {
                $arrUrl['paramether' . $key] = $value;
            }
        }

        $this->arrUrl = $arrUrl;
    }

    private function buildLocation()
    {
        $url = $_SERVER['REQUEST_URI'];
        $lastCharacter = substr($url, -1);

        if ($lastCharacter !== '/') {
            header('Location: ' . $url . '/');
        }
    }

    private function explodeUrl()
    {
        $queryString =  $_SERVER['QUERY_STRING'];
        $explode = explode('/', $queryString);
        $arrClean = [];

        foreach ($explode as $key => &$value) {
            if ($value !== $GLOBALS['globalFolderApplication'] && $value !== '') {
                $arrClean[] =  $value;
            }
        }

        return $arrClean;
    }

    private function validateControllerDefault()
    {
        $folder = $this->arrUrl['folder'];
        $controller = $this->arrUrl['controller'] === '' ? ucfirst($folder) . '.php' : ucfirst($this->arrUrl['controller']) . '.php';
        $file = $GLOBALS['globalFolderController'] . '/' . $folder . '/' . $controller;

        if ($controller === '') {
            return false;
        } else {
            if (file_exists($file)) {
                return [
                    'folder' => $folder,
                    'file' => $file,
                    'controller' => $controller,
                ];
            } else {
                return false;
            }
        }
    }

    private function buildController($arr)
    {
        $controller = $arr['controller'] === '' ? ucfirst($arr['folder']) : ucfirst($arr['controller']);

        require $GLOBALS['globalFolderController'] . '/' . $arr['folder'] . '/' . $controller . '.php';

        $class =
            ucfirst($GLOBALS['globalFolderApplication']) . '\\' .
            ucfirst($GLOBALS['globalFolderController']) . '\\' .
            ucfirst($arr['folder']) . '\\' .
            $controller;

        $objController = new $class();
        return $objController->build();
    }

    private function build404()
    {
        return require $GLOBALS['globalFolderView'] . '/404.php';
    }
}
