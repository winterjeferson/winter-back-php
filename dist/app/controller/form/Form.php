<?php

namespace App\Controller\Form;

require_once __DIR__ . '/../Main.php';

class Form extends \App\Controller\Main
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
            'template' => ['file' => 'default'],
            'content' => ['id' => 'pageForm', 'folder' => 'form', 'file' => 'form', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
