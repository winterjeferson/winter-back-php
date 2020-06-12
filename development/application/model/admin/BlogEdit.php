<?php

namespace Application\Model\Admin;

require_once __DIR__ . '/Blog.php';

class BlogEdit
{
    public function __construct()
    {
        $this->objBlog = new \Application\Model\Admin\Blog();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);
        
        return $this->objBlog->{$action}();
    }
}
