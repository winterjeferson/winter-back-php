<?php

class WbHtml
{

    public $mainUrl = '';
    public $urlFrontEnd = 'https://winterjeferson.github.io/winter-front/production/';

    public function __construct()
    {
        $this->mainUrl = $this->buildMainUrl();
    }

    public function buildMainUrl()
    {
        $objWbUrl = new WbUrl();
        $url = $objWbUrl->getUrlMain();
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
        $objWbSession = new WbSession();
        $objTheme = new Theme();
        $string = '';

        $string .= '<!DOCTYPE html>';
        $string .= '    <html lang="' . $objWbSession->getArray('translation', 'meta_lang') . '">';
        $string .= '        <head>';
        $string .= $this->buildHeaderMeta();
        $string .= $objTheme->buildHeaderAppearance();
        $string .= $this->buildHeaderImage();
        $string .= $this->buildHeaderSEO();
        $string .= $this->buildHeaderFacebook();
        $string .= $objTheme->buildCSS();
        $string .= '        </head>';
        $string .= '        <body class="overflow-hidden">';

        return $string;
    }

    public function buildAdmin()
    {
        $string = '';
        $objWbUrl = new WbUrl();
        $page = $objWbUrl->getUrlParameters()['page'];
        $isAdmin = strpos($page, 'admin') !== false ? true : false;

        if ($isAdmin) {
            $string .= $this->buildTagCSS($this->mainUrl . 'css/Wb_admin');
            $string .= '<meta name="robots" content="noindex">';
        }

        $string .= $this->buildTagCSS($this->mainUrl . 'css/Wb_theme');

        return $string;
    }

    public function buildHeaderFacebook()
    {
        $objWbSession = new WbSession();
        $string = '';

        $string .= '<meta property="og:image" content = "' . $this->mainUrl . 'img/logo/600-315.png"/>';
        $string .= '<meta property="og:image:type" content="image/png" />';
        $string .= '<meta property="og:image:width" content="600" />';
        $string .= '<meta property="og:image:height" content="315" />';
        $string .= '<meta property="og:locale" content="pt_BR" />';
        $string .= '<meta property="og:url" content="' . $this->mainUrl . '" />';
        $string .= '<meta property="og:type" content="website" />';
        $string .= '<meta property="og:title" content="' . $objWbSession->get('meta_title') . '" />';
        $string .= '<meta property="og:site_name" content="' . $objWbSession->get('meta_title') . '" />';
        $string .= '<meta property="og:description" content="' . $objWbSession->get('meta_description') . '" />';

        return $string;
    }

    public function buildHeaderSEO()
    {
        $objWbSession = new WbSession();
        $string = '';

        $string .= '<meta name="application-name" content="' . $objWbSession->get('meta_author') . '" />';
        $string .= '<title>' . $objWbSession->get('meta_title') . '</title>';
        $string .= '<meta name="description" content="' . $objWbSession->get('meta_description') . '" />';
        $string .= '<meta name="author" content="' . $objWbSession->get('meta_author') . '" />';
        $string .= '<meta name="keywords" content="' . $objWbSession->get('meta_keywords') . '" />';

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
        $objWbSession = new WbSession();
        $objTheme = new Theme();
        $objWbUrl = new WbUrl();
        $string = '';

        $string .= '<script>';
        $string .= '    var globalLanguage = "' . $objWbSession->get('language') . '";';
        $string .= '    var globalUrl = "' . $objWbUrl->getUrlMain() . '";';
        $string .= '    var globalTranslation = ' . json_encode($objWbSession->get('translation')) . ';';
        $string .= '</script>';
        $string .= $objTheme->buildJs();
        $string .= $this->buildAdmin();

        $string .= '    </body>';
        $string .= '</html>';

        return $string;
    }
}
