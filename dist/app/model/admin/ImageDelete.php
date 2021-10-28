<?php

namespace App\Model\Admin;

class ImageDelete
{
    public function __construct()
    {
    }

    function build()
    {
        return $this->delete();
    }

    function delete()
    {
        $file = filter_input(INPUT_POST, 'f', FILTER_DEFAULT);
        $path = filter_input(INPUT_POST, 'p', FILTER_DEFAULT);
        $url = '../../../assets/img/dynamic/' . $path . '/';

        if (unlink($url . $file)) {
            return 'fileDeleted';
        } else {
            return 'fileDeleteError';
        }
    }
}
