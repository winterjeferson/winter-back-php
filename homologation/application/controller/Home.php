<?php

namespace Application\Controller;

require_once 'Main.php';

class Home extends Main
{
    public function __construct()
    {
        $this->updateAddress('home');
    }

    function build()
    {
        $this->loadModel('Index');
    }
}
