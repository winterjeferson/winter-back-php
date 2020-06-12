<?php

namespace Application\Model\Admin;

use Application\Core\Session;
use Application\Core\Connection;

class Login
{
    public function __construct()
    {
        $this->objWbSession = new Session();
    }

    function build()
    {
        // $arr = [
        //     // 'language' => $this->language,
        //     // 'listActive' => $arrList['active'],
        //     // 'listInactive' => $arrList['inactive'],
        // ];
        // return $arr;
    }

    function verifyLogin()
    {
        $isLogin = $this->objWbSession->get('login');

        if (!$isLogin) {
            $this->redirect();
        }
    }
    
    // function doLogin()
    // {
    //     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    //     $connection = Connection::open();
    //     $sql = 'SELECT 
    //                 id
    //                 , email
    //                 , password
    //                 , active
    //             FROM 
    //                 login
    //             WHERE 
    //                 email = ' . $email . '
    //             LIMIT 1
    //     ';

    //     $query = $connection->prepare($sql);
    //     $query->execute();
    //     $row = $query->fetch($connection::FETCH_ASSOC);

    //     return $this->doLoginValidate($row, $query);
    // }

    // function doLoginValidate($row, $query)
    // {
    //     $objWbTranslation = new WbTranslation();
    //     $objWbSession = new WbSession();
    //     $password = md5(filter_input(INPUT_POST, 'password', FILTER_DEFAULT));

    //     if ($query->rowCount() === 0 || $row['password'] !== $password) {
    //         return 'problem';
    //     }

    //     if ($row['active'] === '0') {
    //         return 'inactive';
    //     }

    //     if ($row['password'] === $password) {
    //         $objWbTranslation->define();
    //         $objWbSession->set('id', $row['id']);
    //         $objWbSession->set('email', $row['email']);
    //         $objWbSession->set('login', true);
    //         return 'ok';
    //     }
    // }

    function doLogout()
    {
        $this->objSession->set('login', false);
        $this->redirect();
    }

    function redirect()
    {
        $url = $this->objWbSession->getArray('arrUrl', 'mainLanguage');
        header('Location: ' . $url . 'admin/login/');
        die();
    }
}
