<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class BlogAjax extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'blogAjax', 'folder' => 'admin', 'file' => 'blogAjax'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new BlogAjax();
$data = $obj->getModel();
echo $data['blogAjax'];