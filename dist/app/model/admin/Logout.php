<?php

namespace App\Model\Admin;

class Logout
{
    public function __construct()
    {
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/Login.php';

        $this->objLogin = new \App\Model\Admin\Login();
        $this->objSession = new \App\Core\Session();
    }

    function build()
    {
        $this->doLogout();
    }

    function doLogout()
    {
        $this->objLogin->doLogout();
    }
}
