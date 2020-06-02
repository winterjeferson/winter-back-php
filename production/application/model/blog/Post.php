<?php

namespace Application\Model\Blog;

require_once $GLOBALS['globalFolderModel'] . '/Main.php';

class Post extends \Application\Model\Main
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->loadView(['folder' => 'blog', 'file' => 'post']);
    }
}
