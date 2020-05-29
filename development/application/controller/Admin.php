<?php

namespace Application\Controller;

require_once 'Main.php';

class Admin extends Main
{
    public function __construct()
    {
        $this->updateAddress('admin');
    }

    function build()
    {
        $this->loadModel('Index');
    }

    function buildBlog()
    {
        $this->loadModel('Blog');
    }

    function buildLogin()
    {
        $this->loadModel('Login');
    }

    function buildImage()
    {
        $this->loadModel('Image');
    }
}
