<?php

namespace Application\Model\Admin;

require_once $GLOBALS['globalFolderModel'] . '/Main.php';

class Admin extends \Application\Model\Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'admin', 'file' => 'wellcome']);
    }
}
