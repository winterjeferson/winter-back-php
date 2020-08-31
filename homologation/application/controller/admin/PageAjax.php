<?php

namespace Application\Controller\Admin;

require_once __DIR__ . '/../Main.php';

class PageAjax extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function getModel()
    {
        $data = [
            ['id' => 'admin', 'folder' => 'admin', 'file' => 'admin'],
            ['id' => 'pageAjax', 'folder' => 'admin', 'file' => 'pageAjax'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new PageAjax();
$data = $obj->getModel();
echo $data['pageAjax'];