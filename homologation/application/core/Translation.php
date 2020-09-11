<?php

namespace  Application\Core;

use  Application\Core\Session;
use  Application\Core\Route;

class Translation
{
    private $language = '';

    public function __construct()
    {
        require_once __DIR__ . '/../configuration/helper.php';

        $this->objSession = new Session();
        $this->objRoute = new Route();
    }

    public function build()
    {
        $this->define();
        $this->translate();
    }

    private function define()
    {
        $urlLanguage =  $this->objRoute->explodeUrl();
        $findLanguage = array_search('x-default', array_column(getUrArrLanguage(), 'hreflang'));
        $defaultLanguage = getUrArrLanguage()[$findLanguage]['lang'];

        if (count($urlLanguage) > 0) {
            $this->defineUrlTrue($urlLanguage, $defaultLanguage);
        } else {
            $this->defineUrlFalse($defaultLanguage);
        }
    }

    private function defineUrlTrue($urlLanguage, $defaultLanguage)
    {
        $language = $urlLanguage[0];
        $isValidLanguage = array_search($language, array_column(getUrArrLanguage(), 'lang'));

        if ($isValidLanguage === false) {
            $this->objSession->set('language', $defaultLanguage);
        } else {
            $this->objSession->set('language', $language);
        }
    }

    private function defineUrlFalse($defaultLanguage)
    {
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
        $sessionLanguage =  $this->objSession->get('language');

        if (!isset($sessionLanguage)) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, getUrArrLanguage())) {
                $this->language = $defaultLanguage;
            }

            $this->objSession->set('language', $this->language);
        } else {
            $this->language = $this->objSession->get('language');
        }
    }

    public function translate()
    {
        $language = ucfirst($this->objSession->get('language'));
        $namespace = '\Application\Translation\\';
        $class = $namespace . $language;
        $file = __DIR__ . '/../translation/' . $language . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            $this->objRoute->build404();
        }

        $translation = new $class();

        $this->objSession->set('translation', $translation->translation);
        return $translation->translation;
    }
}
