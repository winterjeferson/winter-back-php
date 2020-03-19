<?php

class WbLogin
{

    public function __construct()
    {
    }

    function verifyLogin()
    {
        $objWbSession = new WbSession();
        $isLogin = $objWbSession->get('login');

        if (!$isLogin) {
            $this->redirect('admin-login');
        }
    }

    function doLogin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $objWbQuery = new WbQuery();
        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'login', 'column' => 'id'],
                ['table' => 'login', 'column' => 'email'],
                ['table' => 'login', 'column' => 'password'],
                ['table' => 'login', 'column' => 'active'],
            ],
            'where' => [['table' => 'login', 'column' => 'email', 'value' => $email]],
            'table' => [['table' => 'login']],
            'limit' => [['offset' => 1]],
        ]);


        $query = $objWbQuery->select();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $this->doLoginValidate($row, $query);
    }

    function doLoginValidate($row, $query)
    {
        $objWbTranslation = new WbTranslation();
        $objWbSession = new WbSession();
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        if ($query->rowCount() === 0 || $row['password'] !== $password) {
            return 'problem';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        if ($row['password'] === $password) {
            $objWbTranslation->define();
            $objWbSession->set('id', $row['id']);
            $objWbSession->set('email', $row['email']);
            $objWbSession->set('login', true);
            return 'ok';
        }
    }

    function doLogout()
    {
        $objWbSession = new WbSession();
        $objWbSession->set('login', false);

        $this->redirect('admin-login');
    }

    function redirect($target = '')
    {
        $objWbUrl = new WbUrl();
        $objWbUrl->redirect($target);
        die();
    }
}
