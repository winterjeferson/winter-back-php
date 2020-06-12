<?php

namespace Application\Model\Admin;

use Application\Core\Session;

class Login
{
    public function __construct()
    {
        $this->objWbSession = new Session();
    }

    function build()
    {
    }

    function verifyLogin()
    {
        $isLogin = $this->objWbSession->get('login');

        if (!$isLogin) {
            $this->redirect();
        }
    }

    function doLogout()
    {
        $this->objSession->set('login', false);
        $this->redirect();
    }

    function redirect()
    {
        $url = $this->objWbSession->getArray('arrUrl', 'mainLanguage');
        header('Location: ' . $url . 'admin/login/');
        die();
    }
}
