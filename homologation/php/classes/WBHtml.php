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

    public function buildHeader($metaCustom)
    {
        $objWbSession = new WbSession();
        $objTheme = new Theme();
        $string = '';

        $string .= '<!DOCTYPE html>';
        $string .= '    <html lang="' . $objWbSession->getArray('translation', 'metaLang') . '">';
        $string .= '        <head>';
        $string .= $this->buildHeaderMeta();
        $string .= $objTheme->buildHeaderAppearance();
        $string .= $this->buildHeaderImage();
        $string .= $this->buildHeaderSeo($metaCustom);
        $string .= $this->buildHeaderFacebook($metaCustom);
        $string .= $objTheme->buildCSS();
        $string .= '        </head>';
        $string .= '        <body class="overflow-hidden">';

        return $string;
    }

    public function buildHeaderFacebook($metaCustom)
    {
        $objWbSession = new WbSession();
        $title = isset($metaCustom['title']) ? $metaCustom['title'] : $objWbSession->getArray('translation', 'metaTitle');
        $description = isset($metaCustom['description']) ? $metaCustom['description'] : $objWbSession->getArray('translation', 'metaDescription');

        $string = '
            <meta property="og:image" content = "' . $this->mainUrl . 'img/logo/600-315.png"/>
            <meta property="og:image:type" content="image/png" />
            <meta property="og:image:width" content="600" />
            <meta property="og:image:height" content="315" />
            <meta property="og:locale" content="pt_BR" />
            <meta property="og:url" content="' . $this->mainUrl . '" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="' . $title . '" />
            <meta property="og:site_name" content="' . $title . '" />
            <meta property="og:description" content="' . $description . '" />
        ';

        return $string;
    }

    public function buildHeaderSeo($metaCustom)
    {
        $objWbSession = new WbSession();
        $title = isset($metaCustom['title']) ? $metaCustom['title'] : $objWbSession->getArray('translation', 'metaTitle');
        $author = isset($metaCustom['author']) ? $metaCustom['author'] : $objWbSession->getArray('translation', 'metaAuthor');
        $description = isset($metaCustom['description']) ? $metaCustom['description'] : $objWbSession->getArray('translation', 'metaDescription');
        $keywords = isset($metaCustom['keywords']) ? $metaCustom['keywords'] : $objWbSession->getArray('translation', 'metaKeywords');

        $string = '
            <meta name="application-name" content="' . $title . '" />
            <title>' . $title . '</title>
            <meta name="description" content="' . $description . '" />
            <meta name="author" content="' . $author . '" />
            <meta name="keywords" content="' . $keywords . '" />
        ';

        return $string;
    }

    public function buildHeaderSeoForce($array)
    {
        var_dump($array);
    }

    public function buildHeaderMeta()
    {
        $string = '
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <meta name="format-detection" content="telephone=yes" />
            <meta name="msapplication-tap-highlight" content="no" />
            <meta name="viewport" content="initial-scale=1,maximum-scale=5,user-scalable=yes,width=device-width">
            <base href="' . $this->mainUrl . '">
        ';

        return $string;
    }

    public function buildHeaderImage()
    {
        $string = '
            <link rel="shortcut icon" href="' . $this->mainUrl . 'img/logo/16-16.png" />

            <link rel="apple-touch-icon" href="' . $this->mainUrl . 'img/logo/57-57.png" />
            <link rel="apple-touch-icon" sizes="72x72" href="' . $this->mainUrl . 'img/logo/72-72.png" />
            <link rel="apple-touch-icon" sizes="114x114" href="' . $this->mainUrl . 'img/logo/114-114.png" />

            <meta name="msapplication-TileImage" content="' . $this->mainUrl . 'img/logo/144-144.png" />
        ';

        return $string;
    }

    public function buildFooter()
    {
        $objWbSession = new WbSession();
        $objTheme = new Theme();
        $objWbUrl = new WbUrl();
        $string = '
                    <script>
                        var globalLanguage = "' . $objWbSession->get('language') . '";
                        var globalUrl = "' . $objWbUrl->getUrlMain() . '";
                        var globalTranslation = ' . json_encode($objWbSession->get('translation')) . ';
                    </script>
                    ' . $objTheme->buildJs() . '
                    ' . $objTheme->buildAdmin() . '
                </body>
            </html>
        ';

        return $string;
    }
}
