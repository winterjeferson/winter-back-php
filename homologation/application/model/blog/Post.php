<?php

namespace Application\Model\Blog;

class Post
{
    public function __construct()
    {
        require_once __DIR__ . '/../../configuration/helper.php';
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';

        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $id = $this->objSession->getArray('arrUrl', 'paramether0');
        $post = $this->getPostQuery($id);
        $this->updatePostView($id);
        $this->setUrlSeo($post);

        $arr = [
            'postTitle' => $post['title_' . $this->language],
            'postContent' => $post['content_' . $this->language],
            'postTag' => $post['tag_' . $this->language],
        ];

        return $arr;
    }

    private function setUrlSeo($content)
    {
        foreach ($GLOBALS['globalArrLanguage'] as $key => $value) {
            $this->objSession->setArray('urlSeo' . ucfirst($value), $content['url_' . $value]);
        }
    }

    function updatePostView($id)
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

    function getPostQuery($id)
    {
        $sql = "SELECT 
                    title_{$this->language}
                    , content_{$this->language}
                ";

        foreach ($GLOBALS['globalArrLanguage'] as $key => $value) {
            $sql .= ', url_' . $value;
        }

        $sql .= ", tag_{$this->language}
                FROM 
                    blog
                WHERE
                    active = 1
                AND 
                    id = {$id}";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetch($this->connection::FETCH_ASSOC);
    }
}
