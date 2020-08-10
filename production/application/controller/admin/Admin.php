<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Admin extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-admin'],
            'content' => ['id' => 'pageAdmin', 'folder' => 'admin', 'file' => 'admin', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
