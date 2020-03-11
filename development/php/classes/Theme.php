<?php

class Theme
{
    public $urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';

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

    function getTimezone()
    {
        date_default_timezone_set($this->timezone[$this->timezoneDefault]);

        return date('Y-m-d H:i:s');
    }

    public function buildCSS()
    {
        $objWBPHtml = new WBPHtml();
        $string = '';

        $string .= $objWBPHtml->buildTagCSS($this->urlFrontEnd . 'css/plugin');
        $string .= $objWBPHtml->buildTagCSS($this->urlFrontEnd . 'css/style');

        return $string;
    }

    public function buildJs()
    {
        $objWBPHtml = new WBPHtml();
        $string = '';

        $string .= $objWBPHtml->buildTagJavascript($this->urlFrontEnd . 'js/WFplugin');
        $string .= $objWBPHtml->buildTagJavascript($this->urlFrontEnd . 'js/WFscript');

        return $string;
    }

    public function buildHeaderAppearance()
    {
        $string = '';

        $string .= '<meta name="theme-color" content="#000000" />';
        $string .= '<meta name="msapplication-TileColor" content="#000000" />';

        return $string;
    }

    function buildHTMLBt($status, $id)
    {
        $arr = [];

        switch ($status) {
            case 'delete':
                $arr = ['icon' => 'fa-close', 'color' => 'red', 'title' => 'deletar', 'action' => 'delete'];
                break;
            case 'edit':
                $arr = ['icon' => 'fa-pencil', 'color' => 'blue', 'title' => 'editar', 'action' => 'edit'];
                break;
            case 'email':
                $arr = ['icon' => 'fa-envelope', 'color' => 'blue', 'title' => 'enviar e-mail com dados de acesso', 'action' => 'email'];
                break;
            case 'active':
                $arr = ['icon' => 'fa-minus', 'color' => 'blue', 'title' => 'desativar', 'action' => 'inactivate'];
                break;
            case 'inactive':
                $arr = ['icon' => 'fa-plus', 'color' => 'blue', 'title' => 'ativar', 'action' => 'activate'];
                break;
        }

        return $this->buildHTMLTableBt($arr, $id);
    }

    function buildHTMLTableBt($arr, $id)
    {
        $concat = '';

        $concat .= '<button type="button" class="bt bt-sm has-tooltip bt-' . $arr['color'] . '" title="' . $arr['title'] . '" data-action="' . $arr['action'] . '" data-id="' . $id . '" data-tooltip-color="black" data-tooltip-placement="right">';
        $concat .= '    <span class="fa ' . $arr['icon'] . '" aria-hidden="true"></span>';
        $concat .= '</button>';

        return $concat;
    }

    function verifyLocalhost()
    {
        getcwd();
        $isLocalhost = filter_input(INPUT_SERVER, 'HTTP_HOST') === 'localhost' ? true : false;

        return $isLocalhost;
    }
}
