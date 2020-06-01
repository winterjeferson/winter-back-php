<?php

namespace Application\Controller\Blog;

require_once __DIR__ . '/../Main.php';

class Post extends \Application\Controller\Main
{
    public function __construct()
    {
        $this->updateAddress('blog');
    }

    function build()
    {
        $this->loadModel('Post');
    }
}
