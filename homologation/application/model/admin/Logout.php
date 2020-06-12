<?php

namespace Application\Model\Admin;

require_once __DIR__ . '/Login.php';

use Application\Core\Session;
use Application\Model\Admin\Login;

class Logout
{
    public function __construct()
    {
        $this->objLogin = new Login();
        $this->objWbSession = new Session();
    }

    function build()
    {
        $this->doLogout();
    }

    function doLogout()
    {
        $this->objWbSession = new Session();
        $this->objWbSession->set('login', false);
        $this->objLogin->redirect();
    }
}
