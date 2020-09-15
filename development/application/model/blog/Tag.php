<?php

namespace Application\Model\Blog;

class Tag
{
    public function __construct()
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/../../core/Query.php';

        $this->objQuery = new \Application\Core\Query();
        $this->objSession = new \Application\Core\Session();
        $this->connection = \Application\Core\Connection::open();
        $this->language = $this->objSession->get('language');
    }

    function getList()
    {
        $query = $this->buildTag();
        $arr = $this->buildArr($query);

        return $arr;
    }

    function buildTag()
    {
        return $this->objQuery->build($this->buildTagQuery());
    }

    function buildTagQuery()
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
        
        return $arr;
    }
}
