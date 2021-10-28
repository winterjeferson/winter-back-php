<?php

function verifyLocalhost()
{
    if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
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
    $isLocalhost = verifyLocalhost();

    if ($isLocalhost) {
        return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
    } else {
        return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self);
    }
}

function encode($text)
{
    return iconv(mb_detect_encoding($text, mb_detect_order(), true), "UTF-8", $text);
}

function buildJson($array)
{
    $arr = [];

    foreach ($array as $key => $value) {
        $arr[$key] = is_string($value) ? encode($value) : $value;
    }

    return json_encode($arr);
}

function buildDate($date = '')
{
    $format = 'Y-m-d H:i:s';
    $dateTime = new DateTime($date);
    $dateTime->setTime(14, 55, 24);

    if ($date === '') {
        return date_create('now')->format($format);
    } else {
        return $dateTime->format($format);
    }
}

function removeLineBreak($string)
{
    return preg_replace('/\r|\n/', '', $string);
}

function getTimezoneBr()
{
    return [
        'AC' => 'America/Rio_branco',
        'AL' => 'America/Maceio',
        'AP' => 'America/Belem',
        'AM' => 'America/Manaus',
        'BA' => 'America/Bahia',
        'CE' => 'America/Fortaleza',
        'DF' => 'America/Sao_Paulo',
        'ES' => 'America/Sao_Paulo',
        'GO' => 'America/Sao_Paulo',
        'MA' => 'America/Fortaleza',
        'MT' => 'America/Cuiaba',
        'MS' => 'America/Campo_Grande',
        'MG' => 'America/Sao_Paulo',
        'PR' => 'America/Sao_Paulo',
        'PB' => 'America/Fortaleza',
        'PA' => 'America/Belem',
        'PE' => 'America/Recife',
        'PI' => 'America/Fortaleza',
        'RJ' => 'America/Sao_Paulo',
        'RN' => 'America/Fortaleza',
        'RS' => 'America/Sao_Paulo',
        'RO' => 'America/Porto_Velho',
        'RR' => 'America/Boa_Vista',
        'SC' => 'America/Sao_Paulo',
        'SE' => 'America/Maceio',
        'SP' => 'America/Sao_Paulo',
        'TO' => 'America/Araguaia',
    ];
}

function getUrlFrontEnd()
{
    return 'https://winterjeferson.github.io/winter-front-2-0-0/dist/';
}

function getUrlBackEnd()
{
    return 'https://github.com/winterjeferson/winter-back-php-2-0-0/';
}

function getUrArrLanguage()
{
    return [
        ['lang' =>  'pt', 'country' =>  'pt-BR', 'hreflang' => 'pt-BR'],
        ['lang' =>  'en', 'country' =>  'en-US', 'hreflang' => 'x-default'],
        ['lang' =>  'es', 'country' =>  'es-MX', 'hreflang' => 'es-MX'],
    ];
}

function replaceTag($data)
{
    $pathBanner = 'assets/img/dynamic/blog/banner/';
    $arrSearch  = [
        '>}}',
        '}}',
        '{{img=',
        '{{href=',
    ];
    $arrReplace = [
        '"/>',
        '',
        '<img alt="Image" src="' . $pathBanner,
        $pathBanner,
    ];

    return str_replace($arrSearch, $arrReplace, $data);
}