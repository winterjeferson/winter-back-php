<?php

namespace Application\Controller\Blog;

require_once __DIR__ . '/../Main.php';

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

$obj = new LoadMore();
$data = $obj->getModel();
echo $data['loadMore'];
