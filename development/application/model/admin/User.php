<?php

namespace Application\Model\Admin;

class User
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/helper.php';

        $this->objLogin = new Login();
        $this->objSession = new \Application\Core\Session();
        $this->objAdmin = new \Application\Model\Admin\Admin();
        $this->connection = \Application\Core\Connection::open();
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

    private function getList()
    {
        $sql = 'SELECT 
                   id
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
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $sql = "SELECT 
                      id
                    , active
                    , email
                    , permission
                FROM 
                    user
                WHERE
                    id = {$id}   
                LIMIT 1
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetch($this->connection::FETCH_ASSOC);

        return buildJson($result);
    }

    function doModify()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $value = $status === 'inactivate' ? 0 : 1;
        $sql = "UPDATE 
                    user
                SET
                    active = {$value}
                WHERE 
                    id = {$id}
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return 'done';
    }

    function doDelete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $sql = "DELETE FROM 
                    user
                WHERE 
                    id = {$id}
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return 'done';
    }

    function doSave()
    {
        if ($this->doSaveSql()) {
            return 'done';
        } else {
            return false;
        }
    }

    function doSaveSql()
    {
        $arr = $this->getValue();

        $sql = "INSERT INTO 
                user (
                      email
                    , password
                    , permission
                    , active
                ) VALUES (
                     '{$arr['email']}' 
                    ,'{$arr['password']}'
                    ,'{$arr['permission']}'
                    , 1
                )
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return true;
    }

    function getValue()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $permission = filter_input(INPUT_POST, 'permission', FILTER_DEFAULT);

        if (!$this->validatePermission($permission)) {
            $this->objLogin->doLogout();
            return;
        }

        return [
            'email' => $email,
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
        if ($this->doUpdateSql()) {
            return 'done';
        } else {
            return false;
        }
    }

    function doUpdateSql()
    {
        $arr = $this->getValue();
        $sql = "UPDATE 
                    user
                SET 
                      email = '{$arr['email']}'
                    , password = '{$arr['password']}'
                    , permission = '{$arr['permission']}'
                WHERE
                    id = {$arr['id']}
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return true;
    }
}
