<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Blog extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
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
