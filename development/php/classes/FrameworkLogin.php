<?php

class FrameworkLogin
{

    public function __construct()
    {
    }

    function verifyLogin()
    {
        $objFrameworkSession = new FrameworkSession();
        // $idUser = '';

        if (!$objFrameworkSession->verifyIsSet('id')) {
            //     $idUser = $objFrameworkSession->getSessionValue('id');
            // } else {
            $this->redirect('admin-login');
        }
    }

    function doLogin()
    {
        $objFrameworkSession = new FrameworkSession();

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

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

        if ($query->rowCount() === 0) {
            return 'wrong_email';
        }

        if ($row['active'] === '0') {
            return 'inactive';
        }

        if ($row['password'] === $password) {
            $this->doLogout();
            $objFrameworkSession->setSession('id', $row['id']);
            $objFrameworkSession->setSession('email', $row['email']);
            $this->doLoginSetLastActivity($row['id']);
            return '1';
        } else {
            return 'wrong_password';
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
        $objFrameworkSession = new FrameworkSession();
        $objFrameworkSession->clearSession();
        $this->redirect();
    }

    function redirect($target = '')
    {
        $objFrameworkUrl = new FrameworkUrl();
        header('Location: ' . $objFrameworkUrl->getUrlPage() . $target);
    }
}
