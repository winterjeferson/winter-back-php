<?php

namespace Application\Controller\Page;

require_once __DIR__ . '/../Main.php';

class Page extends \Application\Controller\Main
{
    public function __construct()
    {
    }
    
    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'page', 'folder' => 'page', 'file' => 'page'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-default'],
            'content' => ['id' => 'page', 'folder' => 'page', 'file' => 'page', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
