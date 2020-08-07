<?php

namespace Application\Model\Admin;

require_once __DIR__ . '/../../core/Session.php';
require_once __DIR__ . '/../../core/Connection.php';

use Application\Core\Session;
use Application\Core\Connection;

class LoginData
{
    public function __construct()
    {
    }

    function build()
    {
        $data = $this->getData();
        $validate = $this->validate($data);

        if ($validate) {
            $this->setSession($data);
        }

        return $validate;
    }

    function getData()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $connection = Connection::open();
        $sql = 'SELECT 
                    id
                    , email
                    , password
                    , permission
                    , active
                FROM 
                    user
                WHERE 
                    email = "' . $email . '"
                LIMIT 1
        ';

        $query = $connection->prepare($sql);
        $query->execute();
        $result = $query->fetch($connection::FETCH_ASSOC);
        return $result;
    }

    function validate($row)
    {
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

        if (!$row) {
            return 'problem';
        }

        if ($row['password'] !== md5($password)) {
            return 'problem';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        return true;
    }

    function setSession($data)
    {
        $objSession = new Session();
        $objSession->setArrayMultidimensionl('user', 'id', $data['id']);
        $objSession->setArrayMultidimensionl('user', 'email', $data['email']);
        $objSession->setArrayMultidimensionl('user', 'permission', (int) $data['permission']);
        $objSession->setArrayMultidimensionl('user', 'login', true);
    }
}
