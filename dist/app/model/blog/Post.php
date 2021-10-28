<?php

namespace App\Model\Blog;

class Post
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/../../core/Route.php';
        require_once __DIR__ . '/../../configuration/helper.php';

        $this->objQuery = new \App\Core\Query();
        $this->objSession = new \App\Core\Session();
        $this->objRoute = new \App\Core\Route();
        $this->connection = \App\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $arrUrl = $this->objSession->get('arrUrl');
        $id = isset($arrUrl['paramether0']) ? $arrUrl['paramether0'] : $this->objRoute->build404();
        $post = $this->getPost($id);

        $this->updatePostView($id);
        $this->objRoute->setUrlSeo($post);

        $arr = [
            'postTitle' => $post['title_' . $this->language],
            'postContent' => replaceTag($post['content_' . $this->language]),
            'postTag' => $post['tag_' . $this->language],
            'postAuthor' => $post['name'],
            'tagLink' => $arrUrl['main'] . $arrUrl['language'] . '/',
        ];

        return $arr;
    }

    function updatePostView($id)
    {
        return $this->objQuery->build($this->updatePostViewQuery($id));
    }

    function updatePostViewQuery($id)
    {
        $sql = "UPDATE
                    blog
                SET
                    view = view + 1
                WHERE
                    id = {$id}";

        $query = $this->connection->prepare($sql);
        $query->execute();
    }

    function getPost($id)
    {
        return $this->objQuery->build($this->getPostQuery($id));
    }

    function getPostQuery($id)
    {
        $sql = "SELECT
                    title_{$this->language}
                    , content_{$this->language}
                    , name
                ";

        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $sql .= ', url_' . $lang;
        }

        $sql .= ", tag_{$this->language}
                FROM
                    blog
                LEFT JOIN
                    user
                ON
                    blog.author_id = user.id
                WHERE
                    blog.active = 1
                AND
                    blog.id = {$id}";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetch($this->connection::FETCH_ASSOC);
    }
}
