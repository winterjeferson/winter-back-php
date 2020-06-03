<?php

namespace Application\Model\Shared;

use Application\Core\Session;
use Application\Core\Route;

class Head
{
    public function __construct()
    {
        $this->objSession = new Session();
        $this->objRoute = new Route();
    }

    function build()
    {
        $arr = [
            'urlMain' => $GLOBALS['globalUrl'],
            'urlFrontEnd' => $GLOBALS['globalUrlFrontEnd'],
            'lang' => $this->objSession->get('language'),
            'title' => $this->objSession->getArray('translation', 'metaTitle'),
            'description' => $this->objSession->getArray('translation', 'metaDescription'),
            'author' => $this->objSession->getArray('translation', 'metaAuthor'),
            'keywords' => $this->objSession->getArray('translation', 'metaKeywords'),
            'admin' => $this->verifyAdmin(),
        ];

        return $arr;
    }

    function verifyAdmin()
    {
        $isAdmin = $this->objRoute->verifyInUrl('admin');
        $return = '';

        if ($isAdmin) {
            $return .= '<meta name="robots" content="noindex">';
            $return .= '<link href="' . $GLOBALS['globalUrl'] . 'assets/css/wb-admin.css" rel="stylesheet">';
            $return .= '<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>';
            $return .= '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">';
        }

        return $return;
    }
}
