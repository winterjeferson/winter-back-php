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
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
        $sessionLanguage =  $this->objSession->get('language');
        $urlLanguage =  $this->objRoute->explodeUrl();

        if (count($urlLanguage) > 0) {
            $this->objSession->set('language', $urlLanguage[0]);
        } else {
            if (!isset($sessionLanguage)) {
                $this->language = substr($filterLanguage, 0, 2);

                if (!in_array($this->language, getUrArrLanguage())) {
                    $this->language = 'en';
                }

                $this->objSession->set('language', $this->language);
            } else {
                $this->language = $this->objSession->get('language');
            }
        }
    }

    public function translate()
    {
        $language = ucfirst($this->objSession->get('language'));
        $namespace = '\Application\Translation\\';
        $class = $namespace . $language;
        require_once __DIR__ . '/../translation/' . $language . '.php';
        $translation = new $class();

        $this->objSession->set('translation', $translation->translation);
        return $translation->translation;
    }
}
