<?php

namespace Application\Controller\Admin;

require __DIR__ . '/../Main.php';

class Image extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'image', 'folder' => 'admin', 'file' => 'image'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-admin'],
            'content' => ['id' => 'pageAdminImage', 'folder' => 'admin', 'file' => 'image', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
