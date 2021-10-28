<?php

namespace App\Model\Admin;

class BlogAjax
{
    public function __construct()
    {
        require_once __DIR__ . '/Blog.php';
        require_once __DIR__ . '/../../core/Token.php';

        $this->objBlog = new \App\Model\Admin\Blog();
        $this->objToken = new \App\Core\Token();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);

        $this->objToken->validate();
        return $this->objBlog->{$action}();
    }
}
