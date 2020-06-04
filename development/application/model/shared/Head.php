<?php

namespace Application\Model\Shared;

use Application\Core\Session;
use Application\Core\Route;

class Head
{
    public function __construct()
    {
    }

    function build()
    {
        $objSession = new Session();

        $arr = [
            'urlMain' => $GLOBALS['globalUrl'],
            'urlFrontEnd' => $GLOBALS['globalUrlFrontEnd'],
            'lang' => $objSession->get('language'),
            'title' => $objSession->getArray('translation', 'metaTitle'),
            'description' => $objSession->getArray('translation', 'metaDescription'),
            'author' => $objSession->getArray('translation', 'metaAuthor'),
            'keywords' => $objSession->getArray('translation', 'metaKeywords'),
            'admin' => $this->verifyAdmin(),
        ];

        return $arr;
    }

    function verifyAdmin()
    {
        $objRoute = new Route();
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
