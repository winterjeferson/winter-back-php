<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class Login extends \Application\Controller\Main
{
    public function __construct()
    {
    }
    
    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'login'],
        ];

        return $this->renderModel($data);
    }

    function getView($model)
    {
        $data = [
            'template' => ['file' => 'template-default'],
            'content' => ['id' => 'pageAdminLogin', 'folder' => 'admin', 'file' => 'login', 'model' => $model],
        ];

        return $this->renderView($data);
    }
}
