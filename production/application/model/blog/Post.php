<?php

namespace Application\Model\Blog;

require_once __DIR__ . '/../../core/Session.php';
require_once __DIR__ . '/../../core/Connection.php';

class Post
{
    public function __construct()
    {
        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $id = $this->objSession->getArray('arrUrl', 'paramether0');
        $post = $this->getPostQuery($id);
        $this->updatePostView($id);

        $arr = [
            'postTitle' => $post['title_' . $this->language],
            'postContent' => $post['content_' . $this->language],
            'postTag' => $post['tag_' . $this->language],
        ];

        return $arr;
    }

    function updatePostView($id)
    {
        $sql = 'UPDATE 
                    blog
                SET 
                    view = view + 1
                WHERE
                    id = ' . $id . '
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
    }

    function getPostQuery($id)
    {
        $sql = 'SELECT 
                    title_' . $this->language . '
                    , content_' . $this->language . '
                    , tag_' . $this->language . '
                FROM 
                    blog
                WHERE
                    active = 1
                AND 
                    id = ' . $id . '
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
        
        return $query->fetch($this->connection::FETCH_ASSOC);
    }
}
