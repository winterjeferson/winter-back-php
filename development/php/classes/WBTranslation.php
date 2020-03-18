<?php

class WBTranslation
{
    public $language = '';
    public $arrLanguage = ['pt', 'en'];

    public function __construct()
    {
        $this->define();
    }

    public function define()
    {
        $objWBSession = new WBSession();
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
        $sessionLanguage =  $objWBSession->get('language');

        if (!isset($sessionLanguage)) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $objWBSession->set('language', $this->language);
        } else {
            $this->language = $objWBSession->get('language');
        }
    }

    public function translate()
    {
        $objWBSession = new WBSession();
        $class = 'WBTranslation' . strtoupper($objWBSession->get('language'));
        $translation = new $class();

        $objWBSession->set('translation', $translation->translation);
        return $translation->translation;
    }

    public function change()
    {
        $objWBSession = new WBSession();
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);
        $objWBSession->set('language', $language);

        return 'r1';
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
