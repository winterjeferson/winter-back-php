<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Image extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'image', 'folder' => 'admin', 'file' => 'image'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'admin'],
            'content' => ['id' => 'pageAdminImage', 'folder' => 'admin', 'file' => 'image', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
