<?php

namespace Application\Controller\Home;

require_once __DIR__ . '/../Main.php';

class Home extends \Application\Controller\Main
{
    public function __construct()
    {
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
            'content' => ['id' => 'pageHome', 'folder' => 'home', 'file' => 'home', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
