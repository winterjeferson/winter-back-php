<?php

namespace App\Model\Shared;

class Head
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Route.php';
        require_once __DIR__ . '/../../core/Token.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \App\Core\Query();
        $this->connection = \App\Core\Connection::open();
        $this->objSession = new \App\Core\Session();
        $this->objRoute = new \App\Core\Route();
        $this->objToken = new \App\Core\Token();
        $this->language = $this->objSession->get('language');
    }

    function build()
    {
        $translation = $this->objSession->get('translation');
        $arr = [
            'urlMain' => buildGlobalUrl(),
            'urlFrontEnd' => getUrlFrontEnd(),
            'urlBackEnd' => getUrlBackEnd(),
            'lang' => $this->language,
            'translation' => $translation,
            'translationJson' => json_encode($translation),
            'isAdmin' => $this->objRoute->verifyInUrl('admin'),
            'isNoIdex' => $this->verifyNoIdex(),
            'user' => $this->objSession->get('user'),
            'token' => $this->objToken->get(),
            'menuMain' => $this->getMenu(),
        ];

        foreach (getUrArrLanguage() as $key => $value) {
            $lang = $value['lang'];
            $arr['url' . ucfirst($lang)] = $this->objSession->getArray('arrUrl', $lang);
        }

        return $arr;
    }

    function getMenu()
    {
        return $this->objQuery->build($this->getMenuQuery());
    }

    function getMenuQuery()
    {
        $sql = "SELECT
                     id
                   , menu_{$this->language} as menu
                   , url_{$this->language} as url
                FROM
                    page
                WHERE
                    active = 1
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll($this->connection::FETCH_ASSOC);
    }

    function verifyNoIdex()
    {
        $isAdmin = $this->objRoute->verifyInUrl('admin');
        $isError = $this->objRoute->verifyError();

        if ($isAdmin || $isError) {
            return true;
        } else {
            return false;
        }
    }
}
