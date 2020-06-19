<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class ImageUpload extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'image', 'folder' => 'admin', 'file' => 'ImageUpload'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new ImageUpload();
$data = $obj->getModel();
echo $data['image'];