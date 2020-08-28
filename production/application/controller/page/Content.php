<?php

namespace Application\Controller\Page;

require_once __DIR__ . '/../Main.php';

class Content extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'page', 'folder' => 'page', 'file' => 'content'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-default'],
            'content' => ['id' => 'pagePage', 'folder' => 'page', 'file' => 'page', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
