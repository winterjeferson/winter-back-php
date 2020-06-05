<?php

namespace Application\Controller\Admin;

require __DIR__ . '/../Main.php';

class Login extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function build()
    {
        $model = $this->getModel();
        $view = $this->getView($model);

        echo $view;
    }

    function getModel()
    {
        $data = [
            ['id' => 'head', 'folder' => 'shared', 'file' => 'head'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
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
