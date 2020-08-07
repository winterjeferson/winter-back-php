<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class User extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'user', 'folder' => 'admin', 'file' => 'user'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-admin'],
            'content' => ['id' => 'pageAdminUser', 'folder' => 'admin', 'file' => 'user', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
