<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class User extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'user', 'folder' => 'admin', 'file' => 'user'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'admin'],
            'content' => ['id' => 'pageAdminUser', 'folder' => 'admin', 'file' => 'user', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
