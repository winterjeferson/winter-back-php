<?php

if (!function_exists('loader')) {

    function loader($class)
    {
        $arrFolders = ['classes'];

        if (is_dir('assets/php/classes')) {
            array_push($arrFolders, 'assets/php/classes');
        }

        foreach ($arrFolders as $folder) {
            if (file_exists($folder . '/' . $class . '.php')) {
                include_once $folder . '/' . $class . '.php';
            }
        }
    }
}
spl_autoload_register('loader');
