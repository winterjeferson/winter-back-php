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
                    , active
                FROM 
                    login
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
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        if (!$row || $row['password'] !== $password) {
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
        $objSession->set('id', $data['id']);
        $objSession->set('email', $data['email']);
        $objSession->set('login', true);
    }
}
