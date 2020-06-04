<?php

namespace  Application\Core;

use  Application\Core\Session;

class Translation
{
    private $language = '';
    private $arrLanguage = ['pt', 'en'];
    private $objSession = null;

    public function __construct()
    {
        $this->objSession = new Session();
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

        if (!isset($sessionLanguage)) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $this->objSession->set('language', $this->language);
        } else {
            $this->language = $this->objSession->get('language');
        }
    }

    private function translate()
    {
        $language = ucfirst($this->objSession->get('language'));
        $namespace = '\Application\Translation\\';
        $class = $namespace . $language;
        require __DIR__ . '/../translation/' . $language . '.php';
        // var_dump($namespace . $class);
        $translation = new $class();

        $this->objSession->set('translation', $translation->translation);
        return $translation->translation;
    }

    private function change()
    {
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);
        $this->objSession->set('language', $language);

        return 'r1';
    }

    private function getLanguage()
    {
        return $this->language;
    }
}
