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
        $this->builArrUrl();
        $this->buildLocation();
        $this->setSession();

        $controller = $this->validateController();
        if (!$controller) {
            $this->build404();
            return;
        }

        $isMethod = $this->buildMethod($controller);
        if ($isMethod === false) {
            $this->build404();
            return;
        }
    }

    private function setSession()
    {
        $objSession = new Session();
        $objSession->set('arrUrl', $this->arrUrl);
    }

    private function builArrUrl()
    {
        $explodeUrl = $this->explodeUrl();
        $arrUrl = [
            'main' => $GLOBALS['globalUrl'],
            'language' => isset($explodeUrl[0]) ? $explodeUrl[0] : '',
            'controller' => isset($explodeUrl[1]) ? $explodeUrl[1] : 'home',

        ];

        if (isset($explodeUrl[2])) {
            $arrUrl['method'] = $explodeUrl[2];
            $explodeUrl = $this->explodeUrl();
        }

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

    private function validateController()
    {
        $controller = $this->arrUrl['controller'];
        $file = $GLOBALS['globalFolderController'] . '/' . $controller . '.php';

        if ($controller === '') {
            return false;
        } else {
            if (file_exists($file)) {
                return [
                    'file' => $file,
                    'controller' => $controller,
                ];;
            } else {
                return false;
            }
        }
    }

    private function buildMethod($arr)
    {
        $urlMethod = isset($this->arrUrl['method']) ? $this->arrUrl['method'] : '';
        require $arr['file'];

        $class = ucfirst($GLOBALS['globalFolderApplication']) . '\\' . ucfirst($GLOBALS['globalFolderController']) . '\\' . $arr['controller'];
        $objController = new $class();
        $method = 'build' . ucfirst($urlMethod);

        if (method_exists($objController, $method)) {
            return $objController->$method();
        } else {
            return false;
        }
    }

    private function build404()
    {
        return require $GLOBALS['globalFolderView'] . '/404.php';
    }
}