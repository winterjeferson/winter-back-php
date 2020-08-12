<?php

namespace Application\Model\Admin;

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
        $sql = 'SELECT 
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
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($this->connection::FETCH_ASSOC);

        return $result;
    }

    function getValue()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $titlePt = filter_input(INPUT_POST, 'titlePt', FILTER_DEFAULT);
        $titleEn = filter_input(INPUT_POST, 'titleEn', FILTER_DEFAULT);
        $authorId = filter_input(INPUT_POST, 'authorId', FILTER_DEFAULT);
        $urlPt = filter_input(INPUT_POST, 'urlPt', FILTER_DEFAULT);
        $urlEn = filter_input(INPUT_POST, 'urlEn', FILTER_DEFAULT);
        $contentPt = filter_input(INPUT_POST, 'contentPt', FILTER_DEFAULT);
        $contentEn = filter_input(INPUT_POST, 'contentEn', FILTER_DEFAULT);
        $tagPt = $this->validateTag(filter_input(INPUT_POST, 'tagPt', FILTER_DEFAULT));
        $tagEn = $this->validateTag(filter_input(INPUT_POST, 'tagEn', FILTER_DEFAULT));
        $datePostPt = filter_input(INPUT_POST, 'datePostPt', FILTER_DEFAULT);
        $datePostEn = filter_input(INPUT_POST, 'datePostEn', FILTER_DEFAULT);
        $dateEditPt = filter_input(INPUT_POST, 'dateEditPt', FILTER_DEFAULT);
        $dateEditEn = filter_input(INPUT_POST, 'dateEditEn', FILTER_DEFAULT);
        $thumbnail = filter_input(INPUT_POST, 'thumbnail', FILTER_DEFAULT);

        return [
            'id' => $id,
            'authorId' => (int)$authorId,
            'titlePt' => encode($titlePt),
            'titleEn' => encode($titleEn),
            'urlPt' => $urlPt,
            'urlEn' => $urlEn,
            'contentPt' => encode($contentPt),
            'contentEn' => encode($contentEn),
            'tagPt' => $tagPt,
            'tagEn' => $tagEn,
            'datePostPt' => buildDate($datePostPt),
            'datePostEn' => buildDate($datePostEn),
            'dateEditPt' => buildDate($dateEditPt),
            'dateEditEn' => buildDate($dateEditEn),
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
                      title_pt = '{$arr['titlePt']}'
                    , title_en = '{$arr['titleEn']}'
                    , author_id = '{$arr['authorId']}'
                    , url_pt = '{$arr['urlPt']}'
                    , url_en = '{$arr['urlEn']}'
                    , content_pt = '{$arr['contentPt']}'
                    , content_en = '{$arr['contentEn']}'
                    , tag_pt = '{$arr['tagPt']}'
                    , tag_en = '{$arr['tagEn']}'
                    , date_post_pt = '{$arr['datePostPt']}'
                    , date_post_en = '{$arr['datePostEn']}'
                    , date_edit_pt = '{$arr['dateEditPt']}'
                    , date_edit_en = '{$arr['dateEditEn']}'
                    , thumbnail = '{$arr['thumbnail']}'
                WHERE
                    id = {$arr['id']}
        ";

        $query = $this->connection->prepare($sql);
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
                      title_pt
                    , title_en
                    , author_id
                    , url_pt
                    , url_en
                    , content_pt
                    , content_en
                    , tag_pt
                    , tag_en
                    , date_post_pt
                    , date_post_en
                    , date_edit_pt
                    , date_edit_en
                    , thumbnail
                    , active
                ) VALUES (
                    '{$arr['titlePt']}' 
                    ,'{$arr['titleEn']}' 
                    ,'{$arr['authorId']}' 
                    ,'{$arr['urlPt']}' 
                    ,'{$arr['urlEn']}' 
                    ,'{$arr['contentPt']}'
                    ,'{$arr['contentEn']}'
                    ,'{$arr['tagPt']}' 
                    ,'{$arr['tagEn']}' 
                    ,'{$arr['datePostPt']}'
                    ,'{$arr['datePostEn']}' 
                    ,'{$arr['dateEditPt']}'
                    ,'{$arr['dateEditEn']}'
                    ,'{$arr['thumbnail']}'
                    , 1
                )
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return true;
    }

    function doModify()
    {
        return $this->objQuery->build($this->doModifySql());
    }

    function doModifySql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $value = $status === 'inactivate' ? 0 : 1;
        $sql = "UPDATE 
                    blog
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
        return $this->objQuery->build($this->doDeleteSql());
    }

    function doDeleteSql()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $sql = "DELETE FROM 
                    blog
                WHERE 
                    id = {$id}
        ";

        $query = $this->connection->prepare($sql);
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
                    *
                FROM 
                    blog
                WHERE
                    id = {$id}   
                LIMIT 1
        ";

        $query = $this->connection->prepare($sql);
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
