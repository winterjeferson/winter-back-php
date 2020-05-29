<?php

namespace Application\Controller;

require_once 'Main.php';

class Blog extends Main
{
    public function __construct()
    {
        $this->updateAddress('blog');
    }

    function build()
    {
        $this->loadModel('Blog');
    }

    function buildPost()
    {
        $this->loadModel('Post');
    }
}
