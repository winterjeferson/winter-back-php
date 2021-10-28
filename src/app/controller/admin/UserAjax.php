<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class UserAjax extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'userAjax', 'folder' => 'admin', 'file' => 'userAjax'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new UserAjax();
$data = $obj->getModel();
echo $data['userAjax'];