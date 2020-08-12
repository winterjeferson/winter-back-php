<?php

namespace  Application\Core;

class Token
{

    public function __construct()
    {
        require_once __DIR__ . '/Session.php';

        $this->objSession = new \Application\Core\Session();
    }

    function build()
    {
        $token = md5(time());

        $this->objSession->setArrayMultidimensionl('user', 'token', $token);
        return $token;
    }

    function validate()
    {
        $tokenSent = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);
        $tokenSession =  $this->objSession->getArray('user', 'token');

        if ($tokenSent !== $tokenSession) {
            die();
        }
    }
}
