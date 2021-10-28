<?php

namespace App\Controller\Form;

require_once __DIR__ . '/../Main.php';

class FormAjax extends \App\Controller\Main
{
    public function __construct()
    {
    }

    function sendForm()
    {
        $data = [
            ['id' => 'formAjax', 'folder' => 'form', 'file' => 'formAjax'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new FormAjax();
$data = $obj->sendForm();
echo $data['formAjax'];