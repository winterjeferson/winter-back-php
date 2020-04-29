<?php

class WbSiteMap
{
    public function __construct()
    {
    }

    function build()
    {
        $objWbQuery = new WbQuery();

        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'url_pt'],
                ['table' => 'blog', 'column' => 'url_en'],
                ['table' => 'blog', 'column' => 'id'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1]
            ]
        ]);

        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $string = $this->buildBlog($result);
        $this->wtriteXml($string, 'sitemap-blog');
    }

    function buildBlog($result)
    {
        $objWbUrl = new WbUrl();
        $objWbTranslation = new WbTranslation();
        $lengthQuery = count($result);
        $url = substr($objWbUrl->getUrlMain(), 0, -4);
        $urlBlog = '/blog-post/';
        $string = '';

        $string .= $this->buildTagHeader();
        $string .= '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="https://www.w3.org/1999/xhtml">';

        for ($i = 0; $i < $lengthQuery; $i++) {
            $string .= '<url>';
            $string .= '<loc>' . $url . $objWbTranslation->arrLanguage[0] . $urlBlog . $result[$i]['id'] . '/' . $result[$i]['url_' . $objWbTranslation->arrLanguage[0]] . '/' . '</loc>';
            $string .= '<xhtml:link rel="alternate" hreflang="' . $objWbTranslation->arrLanguage[0] . '" href="' . $url . $objWbTranslation->arrLanguage[0] . $urlBlog . $result[$i]['id'] . '/' . $result[$i]['url_' . $objWbTranslation->arrLanguage[0]] . '/' . '"/>';
            $string .= '<xhtml:link rel="alternate" hreflang="' . $objWbTranslation->arrLanguage[1] . '" href="' . $url . $objWbTranslation->arrLanguage[1] . $urlBlog . $result[$i]['id'] . '/' . $result[$i]['url_' . $objWbTranslation->arrLanguage[1]] . '/' . '"/>';
            $string .= '</url>';
        }

        $string .= '</urlset>';

        return $string;
    }

    function buildTagHeader()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>';
    }

    function wtriteXml($string, $file)
    {
        $xmlobj = new SimpleXMLElement($string);
        $xmlobj->asXML('../../' . $file . '.xml');
    }
}