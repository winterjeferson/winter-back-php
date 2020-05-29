<?php

namespace Application\Model\Admin;

require_once 'model/Main.php';

use Application\Model\Main;

class Index extends Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'admin', 'file' => 'wellcome']);
    }
}
