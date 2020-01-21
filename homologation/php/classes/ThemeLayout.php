<?php

class ThemeLayout {

    public function __construct() {
        
    }

    function buildHTMLBt($status, $id) {
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

    function buildHTMLTableBt($arr, $id) {
        $concat = '';

        $concat .= '<button type="button" class="bt bt-sm has-tooltip bt-' . $arr['color'] . '" title="' . $arr['title'] . '" data-action="' . $arr['action'] . '" data-id="' . $id . '" data-tooltip-color="black" data-tooltip-placement="right">';
        $concat .= '    <span class="fa ' . $arr['icon'] . '" aria-hidden="true"></span>';
        $concat .= '</button>';

        return $concat;
    }

}
