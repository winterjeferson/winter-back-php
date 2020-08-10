<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class UserEdit extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'adminUserEdit', 'folder' => 'admin', 'file' => 'userEdit'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new UserEdit();
$data = $obj->getModel();
echo $data['adminUserEdit'];