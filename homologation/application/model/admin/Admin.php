<?php

namespace Application\Model\Admin;

require_once __DIR__ . '/Login.php';

class Admin
{
    public function __construct()
    {
        $this->objLogin = new Login();
    }

    function build()
    {
        $this->objLogin->verifyLogin();


        $arr = [
            // 'language' => $this->language,
            // 'listActive' => $arrList['active'],
            // 'listInactive' => $arrList['inactive'],
        ];

        return $arr;
    }
}
