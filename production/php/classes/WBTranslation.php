<?php

class WbTranslation
{
    public $language = '';
    public $arrLanguage = ['pt', 'en'];

    public function __construct()
    {
        $this->define();
    }

    public function define()
    {
        $objWbSession = new WbSession();
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
        $sessionLanguage =  $objWbSession->get('language');

        if (!isset($sessionLanguage)) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $objWbSession->set('language', $this->language);
        } else {
            $this->language = $objWbSession->get('language');
        }
    }

    public function translate()
    {
        $objWbSession = new WbSession();
        $class = 'WbTranslation' . strtoupper($objWbSession->get('language'));
        $translation = new $class();

        $objWbSession->set('translation', $translation->translation);
        return $translation->translation;
    }

    public function change()
    {
        $objWbSession = new WbSession();
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);
        $objWbSession->set('language', $language);

        return 'r1';
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
