<?php

namespace Application\Model\Admin;

class PageAjax
{
    public function __construct()
    {
        require_once __DIR__ . '/Page.php';
        require_once __DIR__ . '/../../core/Token.php';

        $this->objPage = new \Application\Model\Admin\Page();
        $this->objToken = new \Application\Core\Token();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);

        $this->objToken->validate();
        return $this->objPage->{$action}();
    }
}
