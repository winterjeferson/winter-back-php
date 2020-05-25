<?php

namespace Model\Admin;

class Admin
{
    private $folderView = 'admin';

    public function __construct()
    {
    }

    function build()
    {
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/admin.php';
    }
}
