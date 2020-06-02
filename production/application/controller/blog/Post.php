<?php

namespace Application\Controller\Blog;

require __DIR__ . '/../Main.php';

class Post extends \Application\Controller\Main
{
    public function __construct()
    {
    }
    
    function build()
    {
        $this->updateAddress('blog');
        $this->loadModel('Post');
    }
}
