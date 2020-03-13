<?php

class WBPDate
{
    public $timezoneBr = [
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

    public function __construct()
    {
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
}
