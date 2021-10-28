<?php

namespace App\Model\Blog;

class LoadMore
{
    public function __construct()
    {
        require_once __DIR__ . '/Blog.php';
    }

    function build()
    {
        $objBlog = new Blog(true);
        return $objBlog->buildLoadMoreButtonClick();
    }
}
