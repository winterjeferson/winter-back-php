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

    return (!empty($protocol) ? 'https' : 'http') . '://' . $host . dirname($self) . '/';
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







$timezoneBr = [
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
$globalIsLocalhost = verifyLocalhost();
$globalUrl = buildGlobalUrl();
$globalUrlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';
$globalUrlBackEnd = 'https://github.com/winterjeferson/winter-back-php/';