<?php

namespace Application\Model\Admin;

class BlogEdit
{
    public function __construct()
    {
        require_once __DIR__ . '/Blog.php';

        $this->objBlog = new \Application\Model\Admin\Blog();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);
        
        return $this->objBlog->{$action}();
    }
}
