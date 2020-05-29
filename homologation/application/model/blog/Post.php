<?php

namespace Application\Model\Blog;

require_once 'model/Main.php';

use Application\Model\Main;

class Post extends Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'blog', 'file' => 'post']);
    }
}