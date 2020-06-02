<?php

namespace Application\Controller;

class Main
{
    public function __construct()
    {
    }

    public function renderModel($data)
    {
        $arrReturn = [];

        foreach ($data as $key => &$value) {
            $namespace = 'Application\Model\\' . ucfirst($value['folder']) . '\\';

            require __DIR__ . '/../model/' . $value['folder'] . '/' . $value['file'] . '.php';
            $class = $namespace . ucfirst($value['file']);
            $obj = new $class();
            $arrReturn[$value['id']] = $obj->build();
        }

        return $arrReturn;
    }

    public function renderView($data)
    {
        ob_start();
        require __DIR__ . '/../view/' . $data['folder'] . '/' . $data['file'] . '.php';
        return ob_get_clean();
    }
}
