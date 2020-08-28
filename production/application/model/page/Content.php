<?php

namespace Application\Model\Page;

class Content
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';

        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $arrUrl = $this->objSession->get('arrUrl');
        $id = $arrUrl['paramether0'];
        $page = $this->getPage($id);

        if (!$page) {
            $this->buildNotFound();
        }
        
        $this->setUrlSeo($page);

        $arr = [
            'title' =>  $page["title_{$this->language}"],
            'content' => $page["content_{$this->language}"],
        ];

        return $arr;
    }

    private function setUrlSeo($content)
    {
        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $this->objSession->setArray('urlSeo' . ucfirst($lang), $content['url_' . $lang]);
        }
    }

    private function buildNotFound()
    {
        require_once __DIR__ . '/../../core/Route.php';

        $objRoute = new \Application\Core\Route();
        $objRoute->build404();
    }

    function getPage($id)
    {
        $sql = "SELECT 
                     title_{$this->language}
                    , content_{$this->language}
                ";

        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $sql .= ', url_' . $lang;
        }

        $sql .= "
                FROM page
                WHERE
                    id = {$id}";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetch($this->connection::FETCH_ASSOC);
    }
}
