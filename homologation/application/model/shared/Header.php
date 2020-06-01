<?php

namespace Application\Model\Shared;

require_once 'model/Main.php';

use Application\Model\Main;

class Shared extends Main
{
    public function __construct()
    {
    }

    function buildHeader()
    {
        return $this->loadView(['folder' => 'shared', 'file' => 'header']);
    }
}
