<?php

namespace Application\Model\Admin;

use PDO;

class Blog
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/../../model/shared/SiteMap.php';
        require_once __DIR__ . '/Login.php';
        require_once __DIR__ . '/Admin.php';
        require_once __DIR__ . '/helper.php';

        $this->objLogin = new \Application\Model\Admin\Login();
        $this->objQuery = new \Application\Core\Query();
        $this->objSession = new \Application\Core\Session();
        $this->objSiteMap = new \Application\Model\Shared\SiteMap();
        $this->objAdmin = new \Application\Model\Admin\Admin();

        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $this->objLogin->verifyLogin();
        $list = $this->getList();
        $arrList = separateList($list);
        $this->objAdmin->verifyPermissionPage(2);

        $arr = [
            'language' => $this->language,
            'listActive' => $arrList['active'],
            'listInactive' => $arrList['inactive'],
            'selectAuthor' => $this->buildSelectAuthor(),
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
                blog.*
                , user.name
            FROM
                blog
            LEFT JOIN 
                user
            ON 
                blog.author_id = user.id
            ORDER BY 
                id DESC 
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($this->connection::FETCH_ASSOC);

        return $result;
    }

    function getValue()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $authorId = filter_input(INPUT_POST, 'authorId', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $tag = $this->validateTag(filter_input(INPUT_POST, 'tag', FILTER_DEFAULT));
        $datePost = filter_input(INPUT_POST, 'datePost', FILTER_DEFAULT);
        $dateEdit = filter_input(INPUT_POST, 'dateEdit', FILTER_DEFAULT);
        $thumbnail = filter_input(INPUT_POST, 'thumbnail', FILTER_DEFAULT);

        return [
            'id' => (int)$id,
            'authorId' => (int)$authorId,
            'title' => encode($title),
            'url' => $url,
            'content' => encode($content),
            'tag' => $tag,
            'datePost' => buildDate($datePost),
            'dateEdit' => buildDate($dateEdit),
            'thumbnail' => $thumbnail,
        ];
    }

    function doUpdate()
    {
        $this->objQuery->build($this->doUpdateSql());

        if ($this->objSiteMap->build('blog')) {
            return 'done';
        }

        return false;
    }

    function doUpdateSql()
    {
        $arr = $this->getValue();

        $sql = "UPDATE 
                    blog
                SET 
                      title_{$this->language} = :title
                    , author_id = :authorId
                    , url_{$this->language} = :url
                    , content_{$this->language} = :content
                    , tag_{$this->language} = :tag
                    , date_post_{$this->language} = :datePost
                    , date_edit_{$this->language} = :dateEdit
                    , thumbnail = :thumbnail
                WHERE
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':title', $arr['title'], PDO::PARAM_STR);
        $query->bindParam(':authorId', $arr['authorId'], PDO::PARAM_INT);
        $query->bindParam(':url', $arr['url'], PDO::PARAM_STR);
        $query->bindParam(':content', $arr['content'], PDO::PARAM_STR);
        $query->bindParam(':tag', $arr['tag'], PDO::PARAM_STR);
        $query->bindParam(':datePost', $arr['datePost'], PDO::PARAM_STR);
        $query->bindParam(':dateEdit', $arr['dateEdit'], PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $arr['thumbnail'], PDO::PARAM_STR);
        $query->bindParam(':id', $arr['id'], PDO::PARAM_INT);
        $query->execute();

        return true;
    }

    function doSave()
    {
        $this->objQuery->build($this->doSaveSql());

        if ($this->objSiteMap->build('blog')) {
            return 'done';
        }

        return false;
    }

    function doSaveSql()
    {
        $arr = $this->getValue();

        $sql = "INSERT INTO 
                blog (
                      title_{$this->language}
                    , author_id
                    , url_{$this->language}
                    , content_{$this->language}
                    , tag_{$this->language}
                    , date_post_{$this->language}
                    , date_edit_{$this->language}
                    , thumbnail
                    , active
                ) VALUES (
                      :title
                    , :authorId 
                    , :url
                    , :content
                    , :tag
                    , :datePost
                    , :dateEdit
                    , :thumbnail
                    , 1
                )
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':title', $arr['title'], PDO::PARAM_STR);
        $query->bindParam(':authorId', $arr['authorId'], PDO::PARAM_INT);
        $query->bindParam(':url', $arr['url'], PDO::PARAM_STR);
        $query->bindParam(':content', $arr['content'], PDO::PARAM_STR);
        $query->bindParam(':tag', $arr['tag'], PDO::PARAM_STR);
        $query->bindParam(':datePost', $arr['datePost'], PDO::PARAM_STR);
        $query->bindParam(':dateEdit', $arr['dateEdit'], PDO::PARAM_STR);
        $query->bindParam(':thumbnail', $arr['thumbnail'], PDO::PARAM_STR);
        $query->execute();

        return true;
    }

    function doModify()
    {
        $this->objQuery->build($this->doModifySql());
        $this->objSiteMap->build('blog');
        return 'done';
    }

    function doModifySql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $active = $status === 'inactivate' ? 0 : 1;
        $sql = "UPDATE 
                    blog
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
                    blog
                WHERE 
                    id = :id
        ";

        $query = $this->connection->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return 'done';
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
                    , tag_{$this->language}
                    , date_post_{$this->language}
                    , date_edit_{$this->language}
                    , author_id
                    , thumbnail
                FROM 
                    blog
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

    function validateTag($target)
    {
        $verifyString = substr($target, -1);

        if ($verifyString === '#') {
            return substr_replace($target, '', -1);
        }

        return $target;
    }

    function buildSelectAuthor()
    {
        return $this->objQuery->build($this->buildSelectAuthorSql());
    }

    function buildSelectAuthorSql()
    {
        $sql = "SELECT 
                    name,
                    id
                FROM
                    user
                WHERE 
                    active = 1
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll($this->connection::FETCH_ASSOC);
    }
}
