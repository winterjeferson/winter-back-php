<?php

namespace Model\Admin;

class Index
{
    private $folderView = 'admin';

    public function __construct()
    {
    }

    function build()
    {
        return require './' . $GLOBALS['globalFolderView'] . '/' . $this->folderView . '/wellcome.php';
    }
}
