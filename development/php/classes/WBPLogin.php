<?php

class WBPLogin
{

    public function __construct()
    {
    }

    function verifyLogin()
    {
        $objWBPSession = new WBPSession();

        if (!$objWBPSession->verifyIsSet('id')) {
            $this->redirect('admin-login');
        }
    }

    function doLogin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $objWBPQuery = new WBPQuery();
        $objWBPQuery->populateArray([
            'column' => [
                ['table' => 'login', 'column' => 'id'],
                ['table' => 'login', 'column' => 'email'],
                ['table' => 'login', 'column' => 'password'],
                ['table' => 'login', 'column' => 'active'],
            ],
            'where' => [['table' => 'login', 'column' => 'email', 'value' => $email]],
            'table' => [['table' => 'login']],
            'limit' => [['final' => 1]],
        ]);

        $query = $objWBPQuery->select();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $this->doLoginValidate($row, $query);
    }

    function doLoginValidate($row, $query)
    {
        $objWBPSession = new WBPSession();
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        if ($query->rowCount() === 0 || $row['password'] !== $password) {
            return 'problem';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        if ($row['password'] === $password) {
            $this->clearSession();
            $objWBPSession->setSession('id', $row['id']);
            $objWBPSession->setSession('email', $row['email']);
            $this->doLoginSetLastActivity($row['id']);
            return 'ok';
        }
    }

    function doLoginSetLastActivity($id)
    {
        $objWBPLayout = new WBPLayout();
        $lastActivity = $objWBPLayout->getTimezone();

        $objWBPQuery = new WBPQuery();
        $objWBPQuery->populateArray([
            'table' => [['table' => 'login']],
            'column' => [['column' => 'last_activity', 'value' => $lastActivity]],
            'where' => [['table' => 'login', 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWBPQuery->update();

        return $query;
    }

    function doLogout()
    {
        $this->clearSession();
        $this->redirect('admin-login');
    }

    function clearSession()
    {
        $objWBPSession = new WBPSession();
        $objWBPSession->clearSession();
    }

    function redirect($target = '')
    {
        $objWBPUrl = new WBPUrl();
        $objWBPUrl->redirect($target);
    }
}
