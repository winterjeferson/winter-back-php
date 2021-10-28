<?php

namespace  App\Core;

class Token
{

    public function __construct()
    {
        require_once __DIR__ . '/Session.php';

        $this->objSession = new \App\Core\Session();
    }

    function build()
    {
        $token = md5(time());

        $this->objSession->set('token', $token);
    }

    function get()
    {
        return $this->objSession->get('token');
    }

    function validate()
    {
        $tokenSent = filter_input(INPUT_POST, 'token', FILTER_DEFAULT);
        $tokenSession =  $this->get();

        if ($tokenSent !== $tokenSession) {
            die();
        }
    }
}
