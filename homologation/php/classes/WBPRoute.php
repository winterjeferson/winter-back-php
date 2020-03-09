<?php

class WBPRoute
{

    private $arrRoute = [];

    public function __construct()
    {
    }

    function getUrlMain()
    {
        $objWBPLayout = new WBPLayout();
        $isLocalHost = $objWBPLayout->verifyLocalhost();

        if ($isLocalHost) {
            return 'http://localhost' . dirname(filter_input(INPUT_SERVER, 'PHP_SELF')) . '/';
        } else {
            $protocol = filter_input(INPUT_SERVER, 'HTTPS');
            $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
            $self = filter_input(INPUT_SERVER, 'PHP_SELF');

            return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
        }
    }

    function addRoute($arr)
    {
        $length = count($arr);

        for ($i = 0; $i < $length; $i++) {
            $this->arrRoute[$arr[$i][0]] = $arr[$i][1];
        }
    }

    function getRoute()
    {
        $queryString =  $_SERVER['QUERY_STRING'];
        $explode = explode('/', $queryString);
        $parameter = isset($explode[1]) ? $explode[1] : '';
        $arrValue = isset($this->arrRoute[$parameter]) ? $this->arrRoute[$parameter] : $this->arrRoute['home'];

        return $arrValue;
    }
}
