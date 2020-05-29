<?php

namespace Application\Model\Admin;

require_once 'model/Main.php';

use Application\Model\Main;

class Image extends Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'admin', 'file' => 'image']);
    }
}
