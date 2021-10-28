<?php

namespace App\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class ImageUpload extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'image', 'folder' => 'admin', 'file' => 'ImageUpload'],
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new ImageUpload();
$data = $obj->getModel();
echo $data['image'];