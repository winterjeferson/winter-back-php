<?php

namespace Application\Model\Blog;

require_once __DIR__ . '/Blog.php';

class LoadMore
{
    public function __construct()
    {
    }

    function build()
    {
        $objBlog = new Blog(true);
        return $objBlog->buildLoadMoreButtonClick();
    }
}
