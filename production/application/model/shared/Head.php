<?php

namespace Application\Model\Shared;

class Head
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Route.php';
        require_once __DIR__ . '/../../core/Token.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \Application\Core\Query();
        $this->connection = \Application\Core\Connection::open();
        $this->objSession = new \Application\Core\Session();
        $this->objRoute = new \Application\Core\Route();
        $this->objToken = new \Application\Core\Token();
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
            'admin' => $this->verifyAdmin(),
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

    function verifyAdmin()
    {
        $isAdmin = $this->objRoute->verifyInUrl('admin');
        $return = '';
        $globalUrl = buildGlobalUrl();

        if ($isAdmin) {
            $return .= '
                <meta name="robots" content="noindex">
                <link href="' . $globalUrl . 'assets/css/wb-admin.css" rel="stylesheet">
                <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
                <script src="' . $globalUrl . 'assets/js/wb-admin.js"></script>
            ';
        }

        return $return;
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
}
