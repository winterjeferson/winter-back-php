<?php

class Theme
{
    public $urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';

    public function __construct()
    {
    }

    public function buildCSS()
    {
        $objWbHtml = new WbHtml();
        $string = '';

        $string .= $objWbHtml->buildTagCSS($this->urlFrontEnd . 'css/wf-plugin');
        $string .= $objWbHtml->buildTagCSS($this->urlFrontEnd . 'css/wf-theme');
        
        return $string;
    }
    
    public function buildJs()
    {
        $objWbHtml = new WbHtml();
        $string = '';
        
        $string .= $objWbHtml->buildTagJavascript($this->urlFrontEnd . 'js/wf-plugin');
        $string .= $objWbHtml->buildTagJavascript($this->urlFrontEnd . 'js/wf-theme');
        $string .= $objWbHtml->buildTagJavascript($objWbHtml->mainUrl . 'js/wb-theme');

        return $string;
    }

    public function buildAdmin()
    {
        $string = '';
        $objWbUrl = new WbUrl();
        $objWbHtml = new WbHtml();
        $page = $objWbUrl->getUrlParameters()['page'];
        $isAdmin = strpos($page, 'admin') !== false ? true : false;

        if ($isAdmin) {
            $string .= $objWbHtml->buildTagCSS($objWbHtml->mainUrl . 'css/wb-admin');
            $string .= '<meta name="robots" content="noindex">';
        }

        $string .= $objWbHtml->buildTagCSS($objWbHtml->mainUrl . 'css/wb-theme');

        return $string;
    }

    public function buildHeaderAppearance()
    {
        $string = '
            <meta name="theme-color" content="#000000" />
            <meta name="msapplication-TileColor" content="#000000" />
        ';

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

        $concat .= '<button type="button" class="bt bt-sm bt-' . $arr['color'] . '" title="' . $arr['title'] . '" data-action="' . $arr['action'] . '" data-id="' . $id . '" data-tooltip="true" data-tooltip-color="black" data-tooltip-placement="top">';
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
