<?php

namespace Application\Controller\Home;

require_once __DIR__ . '/../Main.php';

class Home extends \Application\Controller\Main
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
