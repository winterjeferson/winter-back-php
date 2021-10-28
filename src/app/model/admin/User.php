<?php

namespace App\Model\Admin;

use PDO;

class User
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/helper.php';

        $this->objLogin = new Login();
        $this->objSession = new \App\Core\Session();
        $this->objAdmin = new \App\Model\Admin\Admin();
        $this->objQuery = new \App\Core\Query();
        $this->connection = \App\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $this->objLogin->verifyLogin();
        $this->objAdmin->verifyPermissionPage(1);
        $list = $this->getList();
        $arrList = separateList($list);

        $arr = [
            'language' => $this->language,
            'permission' => $this->buildSelectPermission(),
            'listActive' => $this->buildPermission($arrList['active']),
            'listInactive' => $this->buildPermission($arrList['inactive']),
        ];

        return $arr;
    }

    function buildSelectPermission()
    {
        $arrReturn = [];
        $prmissionCurrent = (int)$this->objSession->getArray('user', 'permission');

        foreach ($this->objAdmin->permission as $key => &$value) {
            if ($prmissionCurrent <= $key) {
                array_push($arrReturn, ['value' => $key, 'text' => $this->objSession->getArray('translation', $value)]);
            }
        }

        return $arrReturn;
    }

    private function buildPermission($arr)
    {
        $arrNew = [];
        $count = count($arr);

        for ($i = 0; $i < $count; $i++) {
            foreach ($arr[$i] as $key => &$value) {
                if ($key === 'permission') {
                    $arrNew[$i][$key] = $this->objAdmin->permission[$value];
                } else {
                    $arrNew[$i][$key] = $value;
                }
            }
        }

        return $arrNew;
    }

    function getList()
    {
        return $this->objQuery->build($this->getListQuery());
    }

    private function getListQuery()
    {
        $sql = 'SELECT
                   id
                   , name
                   , email
                   , permission
                   , active
                FROM
                    user
                ORDER BY
                    id DESC
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($this->connection::FETCH_ASSOC);

        return $result;
    }

    function editLoadData()
    {
        return $this->objQuery->build($this->editLoadDataQuery());
    }

    function editLoadDataQuery()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $sql = "SELECT
                      id
                    , name
                    , active
                    , email
                    , permission
                FROM
                    user
                WHERE
                    id = :id
                LIMIT 1
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch($this->connection::FETCH_ASSOC);

        return buildJson($result);
    }

    function doModify()
    {
        return $this->objQuery->build($this->doModifyQuery());
    }

    function doModifyQuery()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $active = $status === 'inactivate' ? 0 : 1;
        $sql = "UPDATE
                    user
                SET
                    active = :active
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':active', $active, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return 'done';
    }

    function doDelete()
    {
        return $this->objQuery->build($this->doDeleteQuery());
    }

    function doDeleteQuery()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $sql = "DELETE FROM
                    user
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return 'done';
    }

    function doSave()
    {
        $query = $this->objQuery->build($this->doSaveQuery());

        if ($query) {
            return 'done';
        }

        return false;
    }

    function doSaveQuery()
    {
        $arr = $this->getValue();

        $sql = "INSERT INTO
                user (
                      email
                    , name
                    , password
                    , permission
                    , active
                ) VALUES (
                      :email
                    , :name
                    , :password
                    , :permission
                    , 1
                )
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':email', $arr['email'], PDO::PARAM_STR);
        $query->bindParam(':name', $arr['name'], PDO::PARAM_STR);
        $query->bindParam(':password', $arr['password'], PDO::PARAM_STR);
        $query->bindParam(':permission', $arr['permission'], PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    function getValue()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $permission = filter_input(INPUT_POST, 'permission', FILTER_DEFAULT);

        if (!$this->validatePermission($permission)) {
            $this->objLogin->doLogout();
            return;
        }

        return [
            'email' => $email,
            'name' => $name,
            'permission' => (int) $permission,
            'password' => md5($password),
            'id' => (int) $id,
        ];
    }

    function validatePermission($permission)
    {
        $prmissionCurrent = $this->objSession->getArray('user', 'permission');

        if ((int)$prmissionCurrent > (int)$permission) {
            return false;
        }

        return true;
    }

    function doUpdate()
    {
        $query = $this->objQuery->build($this->doUpdateQuery());

        if ($query) {
            return 'done';
        }

        return false;
    }

    function doUpdateQuery()
    {
        $arr = $this->getValue();
        $sql = "UPDATE
                    user
                SET
                      email = :email
                    , name = :name
                    , password = :password
                    , permission = :permission
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':email', $arr['email'], PDO::PARAM_STR);
        $query->bindParam(':name', $arr['name'], PDO::PARAM_STR);
        $query->bindParam(':password', $arr['password'], PDO::PARAM_STR);
        $query->bindParam(':permission', $arr['permission'], PDO::PARAM_INT);
        $query->bindParam(':id', $arr['id'], PDO::PARAM_INT);
        $query->execute();

        return true;
    }
}
