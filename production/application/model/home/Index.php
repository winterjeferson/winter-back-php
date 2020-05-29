<?php

namespace Application\Model\Home;

require_once 'model/Main.php';

use Application\Model\Main;

class Index extends Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'home', 'file' => 'home']);
    }
}
