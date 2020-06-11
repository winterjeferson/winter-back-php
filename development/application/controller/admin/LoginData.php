<?php

namespace Application\Controller\Admin;

require __DIR__ . '/../Main.php';

class LoginData extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'loginData'],
        ];

        return $this->renderModel($data);
    }
}

$objLoginData = new LoginData();
$data = $objLoginData->getModel();
echo $data['admin'];