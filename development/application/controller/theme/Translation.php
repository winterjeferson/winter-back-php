<?php

namespace Application\Controller\Theme;

require_once __DIR__ . '/../../core/Translation.php';
require_once __DIR__ . '/../../core/Session.php';

class Translation
{
    public function __construct()
    {
        $this->translate();
    }

    function translate()
    {
        $objSession = new \Application\Core\Session();
        $objTranslation = new \Application\Core\Translation();

        $language = filter_input(INPUT_POST, 'language', FILTER_DEFAULT);

        $objSession->set('language', $language);
        $objTranslation->translate();
    }
}

$obj = new Translation();