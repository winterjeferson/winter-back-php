<?php

class WBPLayout
{

    private $errorDefault = '404';
    public $timezone = [
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
    public $timezoneDefault = '';

    public function __construct()
    {
        $this->timezoneDefault = 'RS';
    }

    public function buildError($target)
    {
        $objWBPTranslation = new WBPTranslation();
        $WBPTranslation = $objWBPTranslation->translateContent();
        $getError = filter_input(INPUT_GET, 'e');

        if (!isset($getError)) {
            $getError = $this->errorDefault;
        }

        return $WBPTranslation['error'][$getError][$target];
    }

    function getTimezone()
    {
        date_default_timezone_set($this->timezone[$this->timezoneDefault]);

        return date('Y-m-d H:i:s');
    }

    function verifyLocalhost()
    {
        getcwd();
        $isLocalhost = filter_input(INPUT_SERVER, 'HTTP_HOST') === 'localhost' ? true : false;

        return $isLocalhost;
    }

    function buildPage($from = 'index')
    {
        $objWBPUrl = new WBPUrl();
        $getUrl = $objWBPUrl->getUrlParameters();
        $page = $getUrl['page'];
        $pageHome = $from === 'index' ? 'home' : 'blog';

        var_dump($getUrl);
        var_dump($page);

        if (file_exists($page . '.php')) {
            $page = $page . '.php';
        } else {
            if ($page === '') {
                $page = $pageHome . '.php';
            } else {
                $page = 'error.php';
            }
        }

        return $page;
    }
}
