<?php

class Theme
{
    public $urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';

    public function __construct()
    {
    }

    public function buildCSS()
    {
        $objWBHtml = new WBHtml();
        $string = '';

        $string .= $objWBHtml->buildTagCSS($this->urlFrontEnd . 'css/wf_plugin');
        $string .= $objWBHtml->buildTagCSS($this->urlFrontEnd . 'css/wf_theme');
        
        return $string;
    }
    
    public function buildJs()
    {
        $objWBHtml = new WBHtml();
        $string = '';
        
        $string .= $objWBHtml->buildTagJavascript($this->urlFrontEnd . 'js/wf_plugin');
        $string .= $objWBHtml->buildTagJavascript($this->urlFrontEnd . 'js/wf_theme');
        $string .= $objWBHtml->buildTagJavascript($objWBHtml->mainUrl . 'js/wb_theme');

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
