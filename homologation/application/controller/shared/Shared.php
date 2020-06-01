<?php

namespace Application\Controller;

require_once __DIR__ . '/../Main.php';

class Home extends \Application\Controller\Main
{
    public function __construct()
    {
        $this->updateAddress('shared');
    }

    function build()
    {
        $this->loadModel('Header');
    }
}
