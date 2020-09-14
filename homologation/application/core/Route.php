<?php

namespace Application\Core;

class Route
{
    public function __construct()
    {
        require_once __DIR__ . '/Session.php';

        $this->objSession = new \Application\Core\Session();
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
        $folder = isset($explodeUrl[1]) ? $explodeUrl[1] : 'home';
        $folderUrl = $folder . '/';
        $controller = isset($explodeUrl[2]) ? $explodeUrl[2] : '';
        $controllerUrl = isset($explodeUrl[2]) ? $explodeUrl[2] . '/' : '';
        $parametherUrl = '';
        $paramether0 = isset($arrUrl['paramether0']) ? $arrUrl['paramether0'] . '/' : '';

        if ($countExplode > $countArrReturn) {
            array_splice($explodeUrl, 0, $countArrReturn);

            foreach ($explodeUrl as $key => &$value) {
                $arrUrl['paramether' . $key] = $value;
                $parametherUrl .= $value . '/';
            }
        }

        foreach ($arrLanguage as $key => $value) {
            $lang = $value['lang'];
            $sessionUrl = $this->objSession->get('arrUrl');
            $urlSeo = isset($sessionUrl['urlSeo' . ucfirst($lang)]) ? $sessionUrl['urlSeo' . ucfirst($lang)] : '';
            $arrUrl[$lang] = $main . $lang . '/' . $folderUrl . $controllerUrl . $paramether0 . $urlSeo;
        }

        $arrUrl['main'] = $main;
        $arrUrl['language'] = $language;
        $arrUrl['folder'] = $folder;
        $arrUrl['controller'] = $controller;
        $arrUrl['full'] = $main . $language . '/' . $folderUrl . $controllerUrl . $parametherUrl;

        return $arrUrl;
    }

    public function buildLocation()
    {
        $url = $this->objSession->get('arrUrl');
        $language = $url['main'] . $url['language'] . '/';
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

    public function setUrlSeo($content = '')
    {
        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $value = isset($content['url_' . $lang]) ? $content['url_' . $lang] : '';
            $this->objSession->setArrayMultidimensionl('arrUrl', 'urlSeo' . ucfirst($lang), $value);
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

    public function build404()
    {
        return $this->buildController(['controller' => 'error', 'folder' => 'error']);
    }

    public function verifyError()
    {
        $isError = false;
        $arrUrl = $this->builArrUrl();
        $controllerDefault = $this->validateControllerDefault($arrUrl);

        if (!$controllerDefault) {
            $isError = true;
        }

        return $isError;
    }
}
