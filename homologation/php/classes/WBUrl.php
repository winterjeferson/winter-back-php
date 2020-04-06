<?php

class WbUrl
{

    function getUrlMain()
    {
        $objTheme= new Theme();
        $isLocalHost = $objTheme->verifyLocalhost();

        if ($isLocalHost) {
            return 'http://localhost' . dirname(filter_input(INPUT_SERVER, 'PHP_SELF')) . '/';
        } else {
            $protocol = filter_input(INPUT_SERVER, 'HTTPS');
            $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
            $self = filter_input(INPUT_SERVER, 'PHP_SELF');

            return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
        }
    }

    function getUrlPage()
    {
        $objWbTranslation = new WbTranslation();
        $mainUrl = $this->getUrlMain();

        return $mainUrl . $objWbTranslation->getLanguage() . '/';
    }

    function getUrlParameters()
    {
        $queryString = filter_input(INPUT_SERVER, 'QUERY_STRING');
        $explode = explode('/', $queryString);

        $language = isset($explode[0]) ? $explode[0] : '';
        $page = isset($explode[1]) ? $explode[1] : '';
        $id = isset($explode[2]) ? $explode[2] : '';
        $friendlyUrl = isset($explode[3]) ? $explode[3] : '';
        $pagination = isset($explode[4]) ? $explode[4] : '';

        return [
            'language' => $language,
            'page' => $page,
            'id' => $id,
            'url' => $friendlyUrl,
            'pagination' => $pagination,
        ];
    }

    function redirect($target = '')
    {
        $lastCharacter = $target === '' ? '' : '/';

        header('Location: ' . $this->getUrlPage() . $target . $lastCharacter);
    }
}
