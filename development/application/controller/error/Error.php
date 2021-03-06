<?php

namespace Application\Controller\Error;

require_once __DIR__ . '/../Main.php';

class Error extends \Application\Controller\Main
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
            'content' => ['id' => 'error', 'folder' => 'error', 'file' => '404', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
