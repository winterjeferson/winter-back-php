<?php

namespace App\Controller\Blog;

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
            ['id' => 'blog', 'folder' => 'blog', 'file' => 'blog'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'default'],
            'content' => ['id' => 'pageBlog', 'folder' => 'blog', 'file' => 'blog', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
