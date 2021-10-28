<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class LoginAjax extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'loginAjax', 'folder' => 'admin', 'file' => 'loginAjax'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new LoginAjax();
$data = $obj->getModel();
echo $data['loginAjax'];