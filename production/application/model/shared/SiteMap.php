<?php

namespace Application\Model\Shared;

class SiteMap
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \Application\Core\Query();
        $this->connection = \Application\Core\Connection::open();
        $this->objSession = new \Application\Core\Session();
    }

    function build($target)
    {
        $sql = $this->buildSql();

        $string = $this->buildLoop($sql);
        $this->wtriteXml($string, 'sitemap-' . $target);

        return true;
    }

    function buildSql()
    {
        return $this->objQuery->build($this->buildSqlQuery());
    }

    function buildSqlQuery()
    {
        $sql = "SELECT 
                   *
                FROM 
                    blog
                WHERE
                    active = 1
        ";

        $query = $this->connection->prepare($sql);
        $query->execute();

        return $query->fetchAll($this->connection::FETCH_ASSOC);
    }

    function buildLoop($query)
    {
        $lengthQuery = count($query);
        $urlMain = $this->objSession->getArray('arrUrl', 'main');
        $arrLanguage = getUrArrLanguage();
        $arrLanguageDefault = $arrLanguage[0]['lang'];
        $urlBlog = '/blog/post/';
        $string = '<?xml version="1.0" encoding="UTF-8"?>';
        $string .= '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="https://www.w3.org/1999/xhtml">';

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

        $string .= '</urlset>';

        return $string;
    }

    function wtriteXml($string, $file)
    {
        $xml = new \SimpleXMLElement($string);
        $xml->asXML(__DIR__ . '/../../../' . $file . '.xml');
    }
}
