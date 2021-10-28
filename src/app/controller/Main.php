<?php

namespace App\Controller;

class Main
{
    public function __construct()
    {
    }

    public function renderModel($data)
    {
        $arrReturn = [];

        foreach ($data as $key => &$value) {
            $namespace = 'App\Model\\' . ucfirst($value['folder']) . '\\';
            require_once __DIR__ . '/../model/' . $value['folder'] . '/' . ucfirst($value['file']) . '.php';
            $class = $namespace . ucfirst($value['file']);
            $obj = new $class();
            $arrReturn[$value['id']] = $obj->build();
        }

        return $arrReturn;
    }

    public function renderView($data)
    {
        $arrDefinedVars = get_defined_vars();
        $arrContent = $arrDefinedVars['data']['content']['model'];
        require_once __DIR__ . '/../view/template/' . $arrDefinedVars['data']['template']['file'] . '.php';
    }
}
