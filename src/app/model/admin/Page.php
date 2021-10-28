<?php

namespace App\Model\Admin;

use PDO;

class Page
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../model/shared/SiteMap.php';
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/helper.php';

        $this->objQuery = new \App\Core\Query();
        $this->objLogin = new \App\Model\Admin\Login();
        $this->objAdmin = new \App\Model\Admin\Admin();
        $this->connection = \App\Core\Connection::open();
        $this->objSession = new \App\Core\Session();
        $this->objSiteMap = new \App\Model\Shared\SiteMap();

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

    function doSave()
    {
        $this->objQuery->build($this->doSaveSql());

        if ($this->objSiteMap->build('page')) {
            return 'done';
        }

        return false;
    }

    function doSaveSql()
    {
        $arr = $this->getValue();

        $sql = "INSERT INTO
                page (
                      title_{$this->language}
                    , url_{$this->language}
                    , menu_{$this->language}
                    , content_{$this->language}
                    , active
                ) VALUES (
                      :title
                    , :url
                    , :menu
                    , :content
                    , 1
                )
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':title', $arr['title'], PDO::PARAM_STR);
        $query->bindParam(':url', $arr['url'], PDO::PARAM_STR);
        $query->bindParam(':menu', $arr['menu'], PDO::PARAM_STR);
        $query->bindParam(':content', $arr['content'], PDO::PARAM_STR);
        $query->execute();

        return true;
    }

    function getValue()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $menu = filter_input(INPUT_POST, 'menu', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);

        return [
            'id' => (int)$id,
            'title' => encode($title),
            'url' => $url,
            'menu' => encode($menu),
            'content' => encode($content),
        ];
    }

    function editLoadData()
    {
        return $this->objQuery->build($this->editLoadDataSql());
    }

    function editLoadDataSql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $sql = "SELECT
                      id
                    , title_{$this->language}
                    , content_{$this->language}
                    , url_{$this->language}
                    , menu_{$this->language}
                FROM
                    page
                WHERE
                    id = :id
                LIMIT 1
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch($this->connection::FETCH_ASSOC);

        return buildJson($result);
    }

    function doUpdate()
    {
        $this->objQuery->build($this->doUpdateSql());

        if ($this->objSiteMap->build('page')) {
            return 'done';
        }

        return false;
    }

    function doUpdateSql()
    {
        $arr = $this->getValue();

        $sql = "UPDATE
                    page
                SET
                      title_{$this->language} = :title
                    , url_{$this->language} = :url
                    , content_{$this->language} = :content
                    , menu_{$this->language} = :menu
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':title', $arr['title'], PDO::PARAM_STR);
        $query->bindParam(':url', $arr['url'], PDO::PARAM_STR);
        $query->bindParam(':content', $arr['content'], PDO::PARAM_STR);
        $query->bindParam(':menu', $arr['menu'], PDO::PARAM_STR);
        $query->bindParam(':id', $arr['id'], PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    function doModify()
    {
        $this->objQuery->build($this->doModifySql());
        $this->objSiteMap->build('page');
        return 'done';
    }

    function doModifySql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $active = $status === 'inactivate' ? 0 : 1;
        $sql = "UPDATE
                    page
                SET
                    active = :active
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':active', $active, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    function doDelete()
    {
        return $this->objQuery->build($this->doDeleteSql());
    }

    function doDeleteSql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $sql = "DELETE FROM
                    page
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return 'done';
    }
}
