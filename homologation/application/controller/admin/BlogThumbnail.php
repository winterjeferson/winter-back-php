<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class BlogThumbnail extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'Image'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-empty'],
            'content' => ['id' => 'pageAdminImage', 'folder' => 'admin', 'file' => 'blog-thumbnail', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}

$obj = new BlogThumbnail();
$model = $obj->getModel();
$data = $obj->getView($model);
echo $data;
