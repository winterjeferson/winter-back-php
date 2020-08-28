<?php

namespace Application\Controller\Admin;

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
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'page', 'folder' => 'admin', 'file' => 'page'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-admin'],
            'content' => ['id' => 'pageAdminPage', 'folder' => 'admin', 'file' => 'page', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
