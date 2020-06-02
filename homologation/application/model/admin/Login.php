<?php

namespace Application\Model\Admin;

require_once $GLOBALS['globalFolderModel'] . '/Main.php';

class Login extends \Application\Model\Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'admin', 'file' => 'login']);
    }
}
