<?php

namespace Application\Model\Blog;

use Application\Core\Session;
use Application\Core\Connection;

class Post
{
    public function __construct()
    {
        $this->objSession = new Session();
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
        $connection = Connection::open();
        $sql = 'UPDATE 
                    blog
                SET 
                    view = view + 1
                WHERE
                    id = ' . $id . '
        ';

        $query = $connection->prepare($sql);
        $query->execute();
    }

    function getPostQuery($id)
    {
        $connection = Connection::open();
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

        $query = $connection->prepare($sql);
        $query->execute();
        return $query->fetch($connection::FETCH_ASSOC);
    }
}
