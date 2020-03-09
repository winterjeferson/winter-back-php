<?php

class FrameworkLogin
{

    public function __construct()
    {
    }

    function verifyLogin()
    {
        $objFrameworkSession = new FrameworkSession();

        if (!$objFrameworkSession->verifyIsSet('id')) {
            $this->redirect('admin-login');
        }
    }

    function doLogin()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        $objFrameworkQuery = new FrameworkQuery();
        $objFrameworkQuery->populateArray([
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

        $query = $objFrameworkQuery->select();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $this->doLoginValidate($row, $query);
    }

    function doLoginValidate($row, $query)
    {
        $objFrameworkSession = new FrameworkSession();
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

        if ($query->rowCount() === 0 || $row['password'] !== $password) {
            return 'problem';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        if ($row['password'] === $password) {
            $this->clearSession();
            $objFrameworkSession->setSession('id', $row['id']);
            $objFrameworkSession->setSession('email', $row['email']);
            $this->doLoginSetLastActivity($row['id']);
            return 'ok';
        }
    }

    function doLoginSetLastActivity($id)
    {
        $objFrameworkLayout = new FrameworkLayout();
        $lastActivity = $objFrameworkLayout->getTimezone();

        $objFrameworkQuery = new FrameworkQuery();
        $objFrameworkQuery->populateArray([
            'table' => [['table' => 'login']],
            'column' => [['column' => 'last_activity', 'value' => $lastActivity]],
            'where' => [['table' => 'login', 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objFrameworkQuery->update();

        return $query;
    }

    function doLogout()
    {
        $this->clearSession();
        $this->redirect();
    }

    function clearSession()
    {
        $objFrameworkSession = new FrameworkSession();
        $objFrameworkSession->clearSession();
    }

    function redirect($target = '')
    {
        $objFrameworkUrl = new FrameworkUrl();
        $objFrameworkUrl->redirect($target);
    }
}
