<?php

namespace Application\Controller\Blog;

require __DIR__ . '/../Main.php';

class LoadMore extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'loadMore', 'folder' => 'blog', 'file' => 'loadMore'],
        ];

        return $this->renderModel($data);
    }
}

$objLoadMore = new LoadMore();
$data = $objLoadMore->getModel();
echo $data['loadMore'];
