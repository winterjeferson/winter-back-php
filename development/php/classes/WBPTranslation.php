<?php

class WBPTranslation
{

    public $language = '';
    public $arrLanguage = array('pt', 'en');
    public $objWBPSession;

    public function __construct()
    {
        $this->objWBPSession = new WBPSession();
        $this->defineLanguage();
    }

    public function defineLanguage()
    {
        $this->objWBPSession->startSession();
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');

        if (!isset($_SESSION['WBPLanguage'])) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $this->objWBPSession->setSession('WBPLanguage', $this->language);
        } else {
            $this->language = $this->objWBPSession->getSessionValue('WBPLanguage');
        }
    }

    public function translateContent()
    {
        $objWBPUrl = new WBPUrl();
        $file = '';

        if (file_exists('json/' . $this->language . '.json')) {
            $file = file_get_contents('json/' . $this->language . '.json');
        }

        $json = json_decode($file, true);

        return $json;
    }

    public function changeLanguage()
    {
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);

        $this->objWBPSession->setSession('WBPLanguage', $language);
        return 'r1';
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
