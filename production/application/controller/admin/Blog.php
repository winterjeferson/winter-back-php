<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Blog extends \Application\Controller\Main
{
    public function __construct()
    {
        $this->updateAddress('admin');
    }

    function build()
    {
        $this->loadModel('Blog');
    }
}
