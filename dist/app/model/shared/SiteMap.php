<?php

namespace App\Model\Shared;

class SiteMap
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \App\Core\Query();
        $this->connection = \App\Core\Connection::open();
        $this->objSession = new \App\Core\Session();
    }

    function build($target)
    {
        $method = 'build' . ucfirst($target);
        return $this->{$method}($target);
    }

    function buildPage($target)
    {
        $sql = $this->buildBlogSql($target);
        $string = $this->buildPageLoop($sql);
        $this->wtriteXml($string, $target);

        return true;
    }

    function buildPageSql($target)
    {
        return $this->objQuery->build($this->buildQuery($target));
    }

    function buildPageLoop($query)
    {
        $lengthQuery = count($query);
        $urlMain = $this->objSession->getArray('arrUrl', 'main');
        $arrLanguage = getUrArrLanguage();
        $arrLanguageDefault = $arrLanguage[0]['lang'];
        $urlBlog = '/page/content/';
        $string = $this->buildXmlHead();

        for ($i = 0; $i < $lengthQuery; $i++) {
            $string .= '<url>';
            $string .= '<loc>' . $urlMain . $arrLanguageDefault . $urlBlog . $query[$i]['id'] . '/' . $query[$i]['url_' . $arrLanguageDefault] . '/' . '</loc>';

            foreach ($arrLanguage as $key => $value) {
                $id = $query[$i]['id'];
                $urlFriend = $query[$i]['url_' . $arrLanguage[$key]['lang']];
                $lang = $arrLanguage[$key]['lang'];
                $hreflang = $arrLanguage[$key]['hreflang'];

                if ($urlFriend !== '') {
                    $string .= '
                        <xhtml:link rel="alternate" hreflang="' . $hreflang . '" href="' . $urlMain . $lang . $urlBlog . $id . '/' . $urlFriend . '/' . '"/>
                    ';
                }
            }

            $string .= '</url>';
        }

        $string .= $this->buildXmlFooter();

        return $string;
    }

    function buildBlog($target)
    {
        $sql = $this->buildBlogSql($target);
        $string = $this->buildBlogLoop($sql);
        $this->wtriteXml($string, $target);

        return true;
    }

    function buildBlogSql($target)
    {
        return $this->objQuery->build($this->buildQuery($target));
    }

    function buildBlogLoop($query)
    {
        $lengthQuery = count($query);
        $urlMain = $this->objSession->getArray('arrUrl', 'main');
        $arrLanguage = getUrArrLanguage();
        $arrLanguageDefault = $arrLanguage[0]['lang'];
        $urlBlog = '/blog/post/';
        $string = $this->buildXmlHead();

        for ($i = 0; $i < $lengthQuery; $i++) {
            $string .= '<url>';
            $string .= '<loc>' . $urlMain . $arrLanguageDefault . $urlBlog . $query[$i]['id'] . '/' . $query[$i]['url_' . $arrLanguageDefault] . '/' . '</loc>';

            foreach ($arrLanguage as $key => $value) {
                $id = $query[$i]['id'];
                $urlFriend = $query[$i]['url_' . $arrLanguage[$key]['lang']];
                $lang = $arrLanguage[$key]['lang'];
                $hreflang = $arrLanguage[$key]['hreflang'];

                if ($urlFriend !== '') {
                    $string .= '
                        <xhtml:link rel="alternate" hreflang="' . $hreflang . '" href="' . $urlMain . $lang . $urlBlog . $id . '/' . $urlFriend . '/' . '"/>
                    ';
                }
            }

            $string .= '</url>';
        }

        $string .= $this->buildXmlFooter();

        return $string;
    }

    function buildQuery($target)
    {
        $sql = "SELECT
                   *
                FROM
                    $target
                WHERE
                    active = 1
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll($this->connection::FETCH_ASSOC);
    }

    function buildXmlHead()
    {
        return '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="https://www.w3.org/1999/xhtml">';
    }

    function buildXmlFooter()
    {
        return '</urlset>';
    }

    function wtriteXml($string, $file)
    {
        $xml = new \SimpleXMLElement($string);
        $xml->asXML(__DIR__ . '/../../../sitemap-' . $file . '.xml');
    }
}
