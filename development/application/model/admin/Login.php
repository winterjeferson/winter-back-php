<?php

namespace Application\Model\Admin;

class Login
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';

        $this->objSession = new \Application\Core\Session();
    }

    function build()
    {
    }

    function verifyLogin()
    {
        $isLogin = $this->objSession->getArray('user', 'login');

        if (!$isLogin) {
            $this->doLogout();
        }
    }

    function doLogout()
    {
        $this->objSession->setArrayMultidimensionl('user', 'login', false);
        $arr = $this->objSession->get('arrUrl');
        $url = $arr['main'] . $arr['language'] . '/';
        header('Location: ' . $url . 'admin/login/');
        die();
    }
}
