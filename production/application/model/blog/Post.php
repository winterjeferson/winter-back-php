<?php

namespace Application\Model\Blog;

class Post
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \Application\Core\Query();
        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $arrUrl = $this->objSession->get('arrUrl');
        $id = $arrUrl['paramether0'];
        $post = $this->getPost($id);

        if (!$post) {
            $this->buildNotFound();
        }

        $this->updatePostView($id);
        $this->setUrlSeo($post);

        $arr = [
            'postTitle' => $post['title_' . $this->language],
            'postContent' => $post['content_' . $this->language],
            'postTag' => $post['tag_' . $this->language],
            'postAuthor' => $post['name'],
            'tagLink' => $arrUrl['main'] . $arrUrl['language'] . '/',
        ];

        return $arr;
    }

    private function buildNotFound()
    {
        require_once __DIR__ . '/../../core/Route.php';

        $objRoute = new \Application\Core\Route();
        $objRoute->build404();
    }

    private function setUrlSeo($content)
    {
        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $this->objSession->setArray('urlSeo' . ucfirst($lang), $content['url_' . $lang]);
        }
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
