<?php

namespace App\Model\Admin;

class PageAjax
{
    public function __construct()
    {
        require_once __DIR__ . '/Page.php';
        require_once __DIR__ . '/../../core/Token.php';

        $this->objPage = new \App\Model\Admin\Page();
        $this->objToken = new \App\Core\Token();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);

        $this->objToken->validate();
        return $this->objPage->{$action}();
    }
}
