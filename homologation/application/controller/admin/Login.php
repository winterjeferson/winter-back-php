<?php

namespace Application\Controller\Admin;

require __DIR__ . '/../Main.php';

class Login extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function build()
    {
        $this->updateAddress('admin');
        $this->loadModel('Login');
    }
}
