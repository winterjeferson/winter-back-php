<?php

class FrameworkTranslation {

    public $language = '';
    public $arrLanguage = array('pt', 'en');
    public $objFrameworkSession;

    public function __construct() {
        $this->objFrameworkSession = new FrameworkSession();
        $this->defineLanguage();
    }

    public function defineLanguage() {
        $this->objFrameworkSession->startSession();
        $filterLanguage = filter_input(INPUT_SERVER, 'HTTP_ACCEPT_LANGUAGE');

        if (!isset($_SESSION['frameworkLanguage'])) {
            $this->language = substr($filterLanguage, 0, 2);

            if (!in_array($this->language, $this->arrLanguage)) {
                $this->language = 'en';
            }

            $this->objFrameworkSession->setSession('frameworkLanguage', $this->language);
        } else {
            $this->language = $this->objFrameworkSession->getSessionValue('frameworkLanguage');
        }
    }

    public function translateContent() {
        $file = '';
        if (file_exists('json/' . $this->language . '.json')) {
            $file = file_get_contents('json/' . $this->language . '.json');
        } else {
            $file = file_get_contents('../json/' . $this->language . '.json');
        }


        $json = json_decode($file, true);

        return $json;
    }

    public function changeLanguage() {
        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);

        $this->objFrameworkSession->setSession('frameworkLanguage', $language);
        return 'r1';
    }

    public function getLanguage() {
        return $this->language;
    }

}
