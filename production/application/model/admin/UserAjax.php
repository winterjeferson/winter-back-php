<?php

namespace Application\Model\Admin;

class UserAjax
{
    public function __construct()
    {
        require_once __DIR__ . '/User.php';

        $this->objUser = new \Application\Model\Admin\User();
    }

    function build()
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_DEFAULT);
        
        return $this->objUser->{$action}();
    }
}
