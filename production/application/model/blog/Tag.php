<?php

namespace Application\Model\Blog;

require_once __DIR__ . '/../../core/Session.php';
require_once __DIR__ . '/../../core/Connection.php';

class Tag
{
    public function __construct()
    {
        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function getList()
    {
        $query = $this->buildQuery();
        $arr = $this->buildArr($query);

        return $arr;
    }

    function buildQuery()
    {
        $sql = 'SELECT 
                    tag_' . $this->language . '
                FROM blog
                WHERE
                    active = 1
                    AND 
                    tag_' . $this->language . ' != ""
        ';

        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($this->connection::FETCH_ASSOC);

        return $result;
    }

    function buildArr($result)
    {
        $tag = 'tag_' . $this->language;
        $length = count($result);
        $arr = [];

        for ($i = 0; $i < $length; $i++) {
            $explode = explode('#', $result[$i][$tag]);
            $lengthExplore = count($explode);

            for ($j = 0; $j < $lengthExplore; $j++) {
                if ($explode[$j] !== '') {
                    if (!isset($arr[$explode[$j]])) {
                        $arr[$explode[$j]]['sum'] = 1;
                    } else {
                        $arr[$explode[$j]]['sum']++;
                    }
                }
            }
        }

        $key = array_column($arr, 'sum');
        array_multisort($key, SORT_DESC, $arr);

        return $this->buildHtml($arr);
    }

    function buildHtml($arr)
    {
        $string = '<ul class="tag-list">';

        foreach ($arr as $value => $key) {
            $string .= '
                <li>
                    <div class="tag-item tag-grey">
                        <a href="' . $this->objSession->getArray('arrUrl', 'mainLanguage') . 'blog/tag/' . $value . '" class="link link-grey">
                            <span class="text">' . $value . '</span>
                        </a>
                    </div>
                </li>
            ';
        }

        $string .= '</ul>';

        return removeLineBreak($string);
    }
}
