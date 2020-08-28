<?php

namespace Application\Model\Admin;

class Page
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/helper.php';

        $this->objQuery = new \Application\Core\Query();
        $this->objLogin = new \Application\Model\Admin\Login();
        $this->objAdmin = new \Application\Model\Admin\Admin();
        $this->connection = \Application\Core\Connection::open();
        $this->objSession = new \Application\Core\Session();

        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $this->objLogin->verifyLogin();
        $this->objAdmin->verifyPermissionPage(2);
        $list = $this->getList();
        $arrList = separateList($list);

        $arr = [
            'language' => $this->language,
            'page' => $list,
            'listActive' => $arrList['active'],
            'listInactive' => $arrList['inactive'],
        ];

        return $arr;
    }

    function getList()
    {
        return $this->objQuery->build($this->getListQuery());
    }

    function getListQuery()
    {
        $sql = "SELECT 
                  id
                , active
                , menu_{$this->language} as menu
                , title_{$this->language} as title
                , url_{$this->language} as url
                , content_{$this->language} as content
            FROM
                page
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($this->connection::FETCH_ASSOC);

        return $result;
    }

    // function getPage()
    // {
    //     return $this->objQuery->build($this->getPageQuery());
    // }

    // function getPageQuery()
    // {
    //     $sql = "SELECT 
    //               title_{$this->language} as title
    //             , content_{$this->language} as content
    //         FROM
    //             page
    //         WHERE
    //             id = 1
    //     ";

    //     $query = $this->connection->prepare($sql);
    //     $query->execute();
    //     $result = $query->fetch($this->connection::FETCH_ASSOC);

    //     return $result;
    // }
}
