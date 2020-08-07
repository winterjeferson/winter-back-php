<?php

namespace Application\Model\Admin;

class Admin
{
    public function __construct()
    {
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/../../core/Session.php';

        $this->objLogin = new Login();
        $this->objSession = new \Application\Core\Session();
    }

    function build()
    {
        $this->objLogin->verifyLogin();
    }

    function verifyPermission($permissionNeed)
    {
        $prmissionCurrent =  $this->objSession->getArray('user', 'permission');

        if ((int)$prmissionCurrent > (int)$permissionNeed) {
            $this->objLogin->doLogout();
        }
    }
}
