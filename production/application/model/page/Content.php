<?php

namespace Application\Model\Page;

class Content
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Route.php';

        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->objRoute = new \Application\Core\Route();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $arrUrl = $this->objSession->get('arrUrl');
        $id = isset($arrUrl['paramether0']) ? $arrUrl['paramether0'] : $this->objRoute->build404();
        $page = $this->getPage($id);
        
        $this->objRoute->setUrlSeo($page);

        $arr = [
            'title' =>  $page["title"],
            'content' => $page["content"],
        ];

        return $arr;
    }

    function getPage($id, $allContent = false)
    {
        $int = (int)$id;
        $sql = "SELECT 
                     title_{$this->language} as title
                    , content_{$this->language} as content
                ";

        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $sql .= ', url_' . $lang;
        }

        $sql .= "
                FROM page
                WHERE
                    id = {$int}
                ";

        if (!$allContent) {
            $sql .= "
                    AND
                        active = 1
                    ";
        }

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetch($this->connection::FETCH_ASSOC);
    }
}
