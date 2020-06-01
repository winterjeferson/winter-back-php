<?php

namespace Application\Controller\Form;

require_once __DIR__ . '/../Main.php';

class Form extends \Application\Controller\Main
{
    public function __construct()
    {
        $this->updateAddress('form');
    }

    function build()
    {
        $this->loadModel('Form');
    }
}
