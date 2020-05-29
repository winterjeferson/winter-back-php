<?php

namespace Application\Model\Form;

require_once 'model/Main.php';

use Application\Model\Main;

class Form extends Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'form', 'file' => 'form']);
    }
}
