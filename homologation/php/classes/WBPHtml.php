<?php

class WBPHtml
{

    public $mainUrl = '';
    public $urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';
    public $WBPTranslation = '';
    public $objWBPUrl = '';
    public $objWBPTranslation = '';

    public function __construct()
    {
        $this->objWBPUrl = new WBPUrl();
        $this->objWBPTranslation = new WBPTranslation();

        $this->WBPTranslation = $this->objWBPTranslation->translateContent();
        $this->mainUrl = $this->buildMainUrl();
    }

    public function buildMainUrl()
    {
        $url = $this->objWBPUrl->getUrlMain();
        $trimmed = str_replace('admin/', '', $url);

        return $trimmed;
    }

    public function buildTagJavascript($src)
    {
        return '<script src="' . $src . '.js"></script>';
    }

    public function buildTagCSS($src)
    {
        return '<link href="' . $src . '.css" rel="stylesheet">';
    }

    public function buildHeader()
    {
        $string = '';

        $string .= '<!DOCTYPE html>';
        $string .= '    <html lang="' . $this->WBPTranslation['meta_tag']['lang'] . '">';
        $string .= '        <head>';
        $string .= $this->buildHeaderMeta();
        $string .= $this->buildHeaderAppearance();
        $string .= $this->buildHeaderImage();
        $string .= $this->buildHeaderSEO();
        $string .= $this->buildHeaderFacebook();
        $string .= $this->buildHeaderCSS();
        $string .= '        </head>';
        $string .= '        <body class="overflow-hidden">';

        return $string;
    }

    public function buildAdmin()
    {
        $string = '';
        $objWBPUrl = new WBPUrl();
        $page = $objWBPUrl->getUrlParameters()['page'];
        $isAdmin = strpos($page, 'admin') !== false ? true : false;

        if ($isAdmin) {
            $string .= $this->buildTagCSS($this->mainUrl . 'css/admin');
            $string .= $this->buildTagJavascript($this->mainUrl . 'js/admin');
            $string .= '<meta name="robots" content="noindex">';
        }

        return $string;
    }

    public function buildHeaderCSS()
    {
        $string = '';

        $string .= $this->buildTagCSS($this->urlFrontEnd . '/css/plugin');
        $string .= $this->buildTagCSS($this->urlFrontEnd . '/css/style');

        return $string;
    }

    public function buildHeaderFacebook()
    {
        $string = '';

        $string .= '<meta property="og:image" content = "' . $this->mainUrl . 'img/logo/600-315.png"/>';
        $string .= '<meta property="og:image:type" content="image/png" />';
        $string .= '<meta property="og:image:width" content="600" />';
        $string .= '<meta property="og:image:height" content="315" />';
        $string .= '<meta property="og:locale" content="pt_BR" />';
        $string .= '<meta property="og:url" content="' . $this->mainUrl . '" />';
        $string .= '<meta property="og:type" content="website" />';
        $string .= '<meta property="og:title" content="' . $this->WBPTranslation['meta_tag']['title'] . '" />';
        $string .= '<meta property="og:site_name" content="' . $this->WBPTranslation['meta_tag']['title'] . '" />';
        $string .= '<meta property="og:description" content="' . $this->WBPTranslation['meta_tag']['description'] . '" />';

        return $string;
    }

    public function buildHeaderSEO()
    {
        $string = '';

        $string .= '<meta name="application-name" content="' . $this->WBPTranslation['meta_tag']['author'] . '" />';
        $string .= '<title>' . $this->WBPTranslation['meta_tag']['title'] . '</title>';
        $string .= '<meta name="description" content="' . $this->WBPTranslation['meta_tag']['description'] . '" />';
        $string .= '<meta name="author" content="' . $this->WBPTranslation['meta_tag']['author'] . '" />';
        $string .= '<meta name="keywords" content="' . $this->WBPTranslation['meta_tag']['keywords'] . '" />';

        return $string;
    }

    public function buildHeaderMeta()
    {
        $string = '';

        $string .= '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
        $string .= '<meta name="format-detection" content="telephone=yes" />';
        $string .= '<meta name="msapplication-tap-highlight" content="no" />';
        $string .= '<meta name="viewport" content="initial-scale=1,maximum-scale=5,user-scalable=yes,width=device-width">';
        $string .= '<base href="' . $this->mainUrl . '">';

        return $string;
    }

    public function buildHeaderAppearance()
    {
        $string = '';

        $string .= '<meta name="theme-color" content="#000000" />';
        $string .= '<meta name="msapplication-TileColor" content="#000000" />';

        return $string;
    }

    public function buildHeaderImage()
    {
        $string = '';

        $string .= '<link rel="shortcut icon" href="' . $this->mainUrl . 'img/logo/16-16.png" />';
        $string .= '<link rel="apple-touch-icon" href="' . $this->mainUrl . 'img/logo/57-57.png" />';
        $string .= '<link rel="apple-touch-icon" sizes="72x72" href="' . $this->mainUrl . 'img/logo/72-72.png" />';
        $string .= '<link rel="apple-touch-icon" sizes="114x114" href="' . $this->mainUrl . 'img/logo/114-114.png" />';

        $string .= '<meta name="msapplication-TileImage" content="' . $this->mainUrl . 'img/logo/144-144.png" />';

        return $string;
    }

    public function buildFooter()
    {
        $string = '';

        $string .= '<script>';
        $string .= '    var globalLanguage = "' . $this->objWBPTranslation->getLanguage() . '";';
        $string .= '    var globalUrl = "' . $this->objWBPUrl->getUrlMain() . '";';
        $string .= '    var globalTranslation = "";';
        $string .= '</script>';
        $string .= $this->buildTagJavascript($this->urlFrontEnd . 'js/WFplugin');
        $string .= $this->buildTagJavascript($this->urlFrontEnd . 'js/WFscript');
        $string .= $this->buildAdmin();

        $string .= '    </body>';
        $string .= '</html>';

        return $string;
    }
}