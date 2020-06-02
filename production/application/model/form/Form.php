<?php

namespace Application\Model\Form;

require_once $GLOBALS['globalFolderModel'] . '/Main.php';

class Form extends \Application\Model\Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'form', 'file' => 'form']);
    }
}
