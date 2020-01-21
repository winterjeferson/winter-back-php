<?php

if (!function_exists('loader')) {

    function loader($class) {
        $arrFolders = ['classes'];

        if (is_dir('php/classes')) {
            array_push($arrFolders, 'php/classes');
        } else {
            if (is_dir('../php/classes')) {
                array_push($arrFolders, '../php/classes');
            } else {
                array_push($arrFolders, '../../php/classes');
            }
        }

        foreach ($arrFolders AS $folder) {
            if (file_exists($folder . '/' . $class . '.php')) {
                include_once $folder . '/' . $class . '.php';
            }
        }
    }

}
spl_autoload_register('loader');
