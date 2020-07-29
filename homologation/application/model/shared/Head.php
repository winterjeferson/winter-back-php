<?php

namespace Application\Model\Shared;

class Head
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Route.php';
        require_once __DIR__ . '/../../configuration/helper.php';

        $this->objSession = new \Application\Core\Session();
    }

    function build()
    {

        $arr = [
            'urlMain' => $GLOBALS['globalUrl'],
            'urlMainLanguage' => $this->objSession->getArray('arrUrl', 'mainLanguage'),
            'urlFrontEnd' => $GLOBALS['globalUrlFrontEnd'],
            'urlBackEnd' => $GLOBALS['globalUrlBackEnd'],
            'lang' => $this->objSession->get('language'),
            'translation' => $this->objSession->get('translation'),
            'translationJson' => json_encode($this->objSession->get('translation')),
            'admin' => $this->verifyAdmin(),
        ];

        foreach ($GLOBALS['globalArrLanguage'] as $key => $value) {
            $arr['url' . ucfirst($value)] = $this->objSession->getArray('arrUrl', $value);
        }

        return $arr;
    }

    function verifyAdmin()
    {
        $objRoute = new \Application\Core\Route();
        $isAdmin = $objRoute->verifyInUrl('admin');
        $return = '';

        if ($isAdmin) {
            $return .= '<meta name="robots" content="noindex">';
            $return .= '<link href="' . $GLOBALS['globalUrl'] . 'assets/css/wb-admin.css" rel="stylesheet">';
            $return .= '<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>';
            $return .= '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">';
            $return .= '<script src="' . $GLOBALS['globalUrl'] . 'assets/js/wb-admin.js"></script>';
        }

        return $return;
    }
}
