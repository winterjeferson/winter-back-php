<?php

class WBPTranslation
{
    public $language = '';
    public $arrLanguage = ['pt', 'en'];

    public function __construct()
    {
        $this->defineLanguage();
    }

    public function defineLanguage()
    {
        $objWBPSession = new WBPSession();
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');
        $sessionLanguage =  $objWBPSession->get('language');

        if (!isset($sessionLanguage)) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $objWBPSession->set('language', $this->language);
        } else {
            $this->language = $objWBPSession->get('language');
        }
    }

    public function translateContent()
    {
        $objWBPSession = new WBPSession();
        $class = 'WBPTranslation' . strtoupper($objWBPSession->get('language'));
        $translation = new $class();

        return $translation->translation;
    }

    public function changeLanguage()
    {
        $objWBPSession = new WBPSession();
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);
        $objWBPSession->set('language', $language);

        return 'r1';
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
