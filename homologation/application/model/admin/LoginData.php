<?php

namespace Application\Model\Admin;

class LoginData
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/../../core/Connection.php';

        $this->objQuery = new \Application\Core\Query();
        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
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
        return $this->objQuery->build($this->getDataQuery());
    }

    function getDataQuery()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $sql = 'SELECT 
                    id
                    , email
                    , name
                    , password
                    , permission
                    , active
                FROM 
                    user
                WHERE 
                    email = "' . $email . '"
                LIMIT 1
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetch($this->connection::FETCH_ASSOC);
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
        $this->objSession->setArrayMultidimensionl('user', 'id', $data['id']);
        $this->objSession->setArrayMultidimensionl('user', 'email', $data['email']);
        $this->objSession->setArrayMultidimensionl('user', 'name', $data['name']);
        $this->objSession->setArrayMultidimensionl('user', 'permission', (int) $data['permission']);
        $this->objSession->setArrayMultidimensionl('user', 'login', true);
    }
}
