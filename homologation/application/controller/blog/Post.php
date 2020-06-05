<?php

namespace Application\Controller\Blog;

require __DIR__ . '/../Main.php';

class Post extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function build()
    {
        $model = $this->getModel();
        $view = $this->getView($model);

        echo $view;
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-default'],
            'content' => ['id' => 'pageBlogPost', 'folder' => 'blog', 'file' => 'post', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
