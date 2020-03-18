<?php

class WBLogin
{

    public function __construct()
    {
    }

    function verifyLogin()
    {
        $objWBSession = new WBSession();
        $isLogin = $objWBSession->get('login');

        if (!$isLogin) {
            $this->redirect('admin-login');
        }
    }

    function doLogin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $objWBQuery = new WBQuery();
        $objWBQuery->populateArray([
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


        $query = $objWBQuery->select();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $this->doLoginValidate($row, $query);
    }

    function doLoginValidate($row, $query)
    {
        $objWBTranslation = new WBTranslation();
        $objWBSession = new WBSession();
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        if ($query->rowCount() === 0 || $row['password'] !== $password) {
            return 'problem';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        if ($row['password'] === $password) {
            $this->clearSession();
            $objWBTranslation->define();
            $objWBSession->set('id', $row['id']);
            $objWBSession->set('email', $row['email']);
            $objWBSession->set('login', true);
            $this->doLoginSetLastActivity($row['id']);
            return 'ok';
        }
    }

    function doLoginSetLastActivity($id)
    {
        $objWBLayout = new WBLayout();
        $lastActivity = $objWBLayout->getTimezone();

        $objWBQuery = new WBQuery();
        $objWBQuery->populateArray([
            'table' => [['table' => 'login']],
            'column' => [['column' => 'last_activity', 'value' => $lastActivity]],
            'where' => [['table' => 'login', 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWBQuery->update();

        return $query;
    }

    function doLogout()
    {
        $objWBSession = new WBSession();
        $objWBSession->set('login', false);

        $this->redirect('admin-login');
    }

    function clearSession()
    {
        $objWBSession = new WBSession();
        $objWBSession->clear();
    }

    function redirect($target = '')
    {
        $objWBUrl = new WBUrl();
        $objWBUrl->redirect($target);
        die();
    }
}
