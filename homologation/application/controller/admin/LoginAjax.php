<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class LoginAjax extends \Application\Controller\Main
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

$obj = new loginAjax();
$data = $obj->getModel();
echo $data['loginAjax'];