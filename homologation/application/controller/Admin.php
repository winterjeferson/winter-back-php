<?php

namespace Application\Controller;

require_once 'Main.php';

class Admin extends Main
{
    public function __construct()
    {
        $this->updateAddress('admin');
    }

    function build()
    {
        $this->loadModel('Index');
    }

    function buildLogin()
    {
        $this->loadModel('Login');
    }
}
