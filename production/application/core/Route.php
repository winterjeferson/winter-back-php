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
        $arrUrl = [];
        $language = $this->objSession->get('language');
        $arrFixedItem = ['language', 'folder', 'controller'];
        $countExplode = count($explodeUrl);
        $countArrReturn = count($arrFixedItem);
        $arrLanguage = getUrArrLanguage();

        $main = buildGlobalUrl();
        $mainLanguage = $main . $language . '/';
        $folder = isset($explodeUrl[1]) ? $explodeUrl[1] : 'home';
        $folderUrl = $folder . '/';
        $controller = isset($explodeUrl[2]) ? $explodeUrl[2] : '';
        $controllerUrl = isset($explodeUrl[2]) ? $explodeUrl[2] . '/' : '';
        $parametherUrl = '';

        if ($countExplode > $countArrReturn) {
            array_splice($explodeUrl, 0, $countArrReturn);

            foreach ($explodeUrl as $key => &$value) {
                $arrUrl['paramether' . $key] = $value;
                $parametherUrl .= $value . '/';
            }
        }

        if (!isset($arrUrl['paramether1'])) {
            foreach ($arrLanguage as $key => $value) {
                $lang = $value['lang'];
                $this->objSession->unset('urlSeo' . ucfirst($lang));
                $arrUrl[$lang] = $main . $lang . '/' . $folderUrl . $controllerUrl;
            }
        } else {
            foreach ($arrLanguage as $key => $value) {
                $lang = $value['lang'];
                $arrUrl[$lang] = $main . $lang . '/' . $folderUrl . $controllerUrl . $arrUrl['paramether0'] . '/' . $this->objSession->get('urlSeo' . ucfirst($lang));
            }
        }

        $arrUrl['main'] = $main;
        $arrUrl['language'] = $language;
        $arrUrl['folder'] = $folder;
        $arrUrl['controller'] = $controller;
        $arrUrl['mainLanguage'] = $mainLanguage;
        $arrUrl['full'] = $main . $language . '/' . $folderUrl . $controllerUrl . $parametherUrl;

        return $arrUrl;
    }

    public function buildLocation()
    {
        $url = $this->objSession->get('arrUrl');
        $language = $url['mainLanguage'];
        $folder = $url['folder'] !== '' ? $url['folder'] . '/' : '';
        $controller = $url['controller'] !== '' ? $url['controller'] . '/' : '';
        $count =  $this->parametherTotal;
        $location = $language .  $folder . $controller;

        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                $location .= $url['paramether' . $i] . '/';
            }
        }

        return $location;
    }

    public function explodeUrl()
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
        $file = __DIR__ . '/../controller/' . $arr['folder'] . '/' . $controller . '.php';

        require_once $file;

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
