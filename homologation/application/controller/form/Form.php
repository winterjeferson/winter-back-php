<?php

namespace Application\Controller\Form;

require __DIR__ . '/../Main.php';

class Form extends \Application\Controller\Main
{
    public function __construct()
    {
    }
    
    function build()
    {
        $this->updateAddress('form');
        $this->loadModel('Form');
    }
}
