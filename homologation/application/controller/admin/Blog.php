<?php

namespace Application\Controller\Admin;

require __DIR__ . '/../Main.php';

class Blog extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'blog', 'folder' => 'admin', 'file' => 'blog'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-admin'],
            'content' => ['id' => 'pageAdminBlog', 'folder' => 'admin', 'file' => 'blog', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
