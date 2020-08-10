<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class ImageDelete extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'image', 'folder' => 'admin', 'file' => 'ImageDelete'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new ImageDelete();
$data = $obj->getModel();
echo $data['image'];