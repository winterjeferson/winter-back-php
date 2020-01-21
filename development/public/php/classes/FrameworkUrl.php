<?php

class FrameworkUrl {

    function getUrlMain() {
        $objFrameworkLayout = new FrameworkLayout();
        $isLocalHost = $objFrameworkLayout->verifyLocalhost();

        if ($isLocalHost) {
            return 'http://localhost' . dirname(filter_input(INPUT_SERVER, 'PHP_SELF')) . '/';
        } else {
            $protocol = filter_input(INPUT_SERVER, 'HTTPS');
            $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
            $self = filter_input(INPUT_SERVER, 'PHP_SELF');

            return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
        }
    }

    function getUrlPage() {
        $objFrameworkTranslation = new FrameworkTranslation();
        $mainUrl = $this->getUrlMain();

        return $mainUrl . $objFrameworkTranslation->getLanguage() . '/';
    }

    function getUrlParameters() {
        $queryString = filter_input(INPUT_SERVER, 'QUERY_STRING');
        $explode = $pieces = explode('/', $queryString);

        $language = isset($explode[0]) ? $explode[0] : '';
        $page = isset($explode[1]) ? $explode[1] : '';
        $id = isset($explode[2]) ? $explode[2] : '';
        $pagination = isset($explode[3]) ? $explode[3] : '';

        return [
            'language' => $language,
            'page' => $page,
            'id' => $id,
            'pagination' => $pagination,
        ];
    }

}
