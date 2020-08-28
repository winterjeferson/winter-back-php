<?php

namespace Application\Model\Admin;

class Admin
{
    public $permission = [
        '0' => 'owner',
        '1' => 'administrator',
        '2' => 'moderator',
        '3' => 'user',
        '4' => 'guest',
    ];

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

        $arr = [
            'menu' => $this->buildMenu()
        ];

        return $arr;
    }

    function buildMenu()
    {
        $arrReturn = [];
        $prmissionCurrent = (int)$this->objSession->getArray('user', 'permission');

        if ($prmissionCurrent <= 1) {
            array_push($arrReturn, ['id' => 'user', 'translation' => 'users']);
        }

        if ($prmissionCurrent <= 2) {
            array_push($arrReturn, ['id' => 'page', 'translation' => 'pageAdmin']);
            array_push($arrReturn, ['id' => 'blog', 'translation' => 'blogAdmin']);
            array_push($arrReturn, ['id' => 'image', 'translation' => 'uploadImage']);
        }

        array_push($arrReturn, ['id' => 'logout', 'translation' => 'logout']);

        return $arrReturn;
    }

    function verifyPermissionPage($permissionNeed)
    {
        $prmissionCurrent =  $this->objSession->getArray('user', 'permission');

        if ((int)$prmissionCurrent > (int)$permissionNeed) {
            $this->objLogin->doLogout();
        }
    }
}
