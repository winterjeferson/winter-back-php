<?php

namespace Application\Core;

use  Application\Core\Session;

class Route
{
    public function __construct()
    {
        $this->objSession = new Session();
    }

    public function build()
    {
        $arrUrl = $this->builArrUrl();
        $this->buildLocation();
        $this->objSession->set('arrUrl', $arrUrl);

        $controllerDefault = $this->validateControllerDefault($arrUrl);
        if (!$controllerDefault) {
            $this->build404();
            return;
        }

        $isController = $this->buildController($this->objSession->get('arrUrl'));
        if ($isController === false) {
            $this->build404();
            return;
        }
    }

    public function verifyInUrl($target)
    {
        $explodeUrl = $this->explodeUrl();

        foreach ($explodeUrl as $key => &$value) {
            if ($value === $target) {
                return true;
            }
        }

        return false;
    }
    private function builArrUrl()
    {
        $explodeUrl = $this->explodeUrl();
        $language = $this->objSession->get('language');
        $arrFixedItem = ['language', 'folder', 'controller'];
        $countExplode = count($explodeUrl);
        $countArrReturn = count($arrFixedItem);

        $arrUrl = [
            'main' => $GLOBALS['globalUrl'],
            'language' => $language,
            'folder' => isset($explodeUrl[1]) ? $explodeUrl[1] : 'home',
            'controller' => isset($explodeUrl[2]) ? $explodeUrl[2] : '',
            'mainLanguage' => $GLOBALS['globalUrl'] . $language . '/',
        ];

        if ($countExplode > $countArrReturn) {
            array_splice($explodeUrl, 0, $countArrReturn);

            foreach ($explodeUrl as $key => &$value) {
                $arrUrl['paramether' . $key] = $value;
            }
        }

        return $arrUrl;
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
            if ($value !== 'application' && $value !== '') {
                $arrClean[] =  $value;
            }
        }

        return $arrClean;
    }

    private function validateControllerDefault($arrUrl)
    {
        $folder = $arrUrl['folder'];
        $controller = $arrUrl['controller'] === '' ? ucfirst($folder) . '.php' : ucfirst($arrUrl['controller']) . '.php';
        $file = 'application/controller/' . $folder . '/' . $controller;

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

        require_once 'application/controller/' . $arr['folder'] . '/' . $controller . '.php';

        $class = 'Application\Controller\\' . ucfirst($arr['folder']) . '\\' . $controller;

        $objController = new $class();

        $model = $objController->getModel();
        $view = $objController->getView($model);

        echo $view;
    }

    private function build404()
    {
        return $this->buildController(['controller' => 'error', 'folder' => 'error']);
    }
}
