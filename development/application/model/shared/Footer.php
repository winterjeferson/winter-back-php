<?php

namespace Application\Model\Shared;

use Application\Core\Session;

class Footer
{
    public function __construct()
    {
        $this->objSession = new Session();
    }

    function build()
    {
        $arr = [
            'urlMain' => $GLOBALS['globalUrl'],
            'urlFrontEnd' => $GLOBALS['globalUrlFrontEnd'],
            'lang' => $this->objSession->get('language'),
            'translation' => json_encode($this->objSession->get('translation')),
        ];

        return $arr;
    }
}
