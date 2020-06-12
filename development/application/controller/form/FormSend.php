<?php

namespace Application\Controller\Form;

require_once __DIR__ . '/../Main.php';

class FormSend extends \Application\Controller\Main
{
    public function __construct()
    {
    }

    function sendForm()
    {
        $data = [
            ['id' => 'formSend', 'folder' => 'form', 'file' => 'formSend'],
        ];

        return $this->renderModel($data);
    }
}

$obj = new FormSend();
$data = $obj->sendForm();
echo $data['formSend'];