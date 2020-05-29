<?php

namespace Application\Controller;

require_once 'Main.php';

class Form extends Main
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
