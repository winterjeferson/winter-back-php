<?php

function verifyLocalhost($arr)
{
    if (in_array($_SERVER['REMOTE_ADDR'], $arr)) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        return true;
    } else {
        return false;
    }
}

function buildGlobalUrl()
{
    $protocol = filter_input(INPUT_SERVER, 'HTTPS');
    $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
    $self = filter_input(INPUT_SERVER, 'PHP_SELF');

    return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
}

function encode($text)
{
    return iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
}



$globalArrLocalhost = ['127.0.0.1', '::1'];
$globalIsLocalhost = verifyLocalhost($globalArrLocalhost);
$globalUrl = buildGlobalUrl();
$globalUrlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';
$globalUrlBackEnd = 'https://github.com/winterjeferson/winter-back-php/';
