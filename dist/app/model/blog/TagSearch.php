<?php

namespace App\Model\Blog;

class TagSearch
{
    public function __construct()
    {
        require_once __DIR__ . '/Blog.php';

        $this->objBlog = new \App\Model\Blog\Blog('Tag');
    }

    function build()
    {
        $listLastPost = $this->objBlog->getList('Tag');
        $listMostViewed = $this->objBlog->getList('MostViewed');
        $listDecodeLastPost = json_decode($listLastPost, true);
        $listDecodeMostViewed = json_decode($listMostViewed, true);

        $arr = [
            'listLastPost' => $listDecodeLastPost['html'],
            'listMostViewed' => $listDecodeMostViewed['html'],
            'listTag' => $this->objBlog->objTag->getList(),
            'btLoadMore' => $this->objBlog->buildLoadMoreButton('Tag'),
            'btMostViewed' => $this->objBlog->buildLoadMoreButton('MostViewed'),
        ];

        return $arr;
    }
}
