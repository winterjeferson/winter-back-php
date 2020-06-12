<?php

namespace Application\Controller\Blog;

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
            ['id' => 'blog', 'folder' => 'blog', 'file' => 'blog'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-default'],
            'content' => ['id' => 'pageBlog', 'folder' => 'blog', 'file' => 'blog', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
