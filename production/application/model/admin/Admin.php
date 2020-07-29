<?php

namespace Application\Model\Admin;

class Admin
{
    public function __construct()
    {
        require_once __DIR__ . '/Login.php';
        
        $this->objLogin = new Login();
    }

    function build()
    {
        $this->objLogin->verifyLogin();
    }
}
