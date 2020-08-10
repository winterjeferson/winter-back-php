<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class BlogEdit extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'blogEdit'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new BlogEdit();
$data = $obj->getModel();
echo $data['admin'];