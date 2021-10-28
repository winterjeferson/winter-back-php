<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Blog extends \App\Controller\Main
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
            'template' => ['file' => 'admin'],
            'content' => ['id' => 'pageAdminBlog', 'folder' => 'admin', 'file' => 'blog', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}