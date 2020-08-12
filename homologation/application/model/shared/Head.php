<?php

namespace Application\Model\Shared;

class Head
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Route.php';
        require_once __DIR__ . '/../../core/Token.php';

        $this->objSession = new \Application\Core\Session();
        $this->objRoute = new \Application\Core\Route();
        $this->objToken = new \Application\Core\Token();
    }

    function build()
    {
        $arr = [
            'urlMain' => buildGlobalUrl(),
            'urlFrontEnd' => getUrlFrontEnd(),
            'urlBackEnd' => getUrlBackEnd(),
            'lang' => $this->objSession->get('language'),
            'translation' => $this->objSession->get('translation'),
            'translationJson' => json_encode($this->objSession->get('translation')),
            'admin' => $this->verifyAdmin(),
            'user' => $this->objSession->get('user'),
            'token' => $this->objToken->get(),
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
                <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
                <script src="' . $globalUrl . 'assets/js/wb-admin.js"></script>
            ';
        }

        return $return;
    }
}
