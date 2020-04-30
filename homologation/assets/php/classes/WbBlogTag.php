<?php

class WbBlogTag
{
    function getList()
    {
        $objWbQuery = new WbQuery();
        $objWbSession = new WbSession();
        $objWbTranslation = new WbTranslation();

        $this->buildQuery($objWbQuery, $objWbSession);
        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $arr = $this->buildArr($result, $objWbSession, $objWbTranslation);

        return $arr;
    }

    function buildQuery($objWbQuery, $objWbSession)
    {
        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'tag_' . $objWbSession->get('language')]
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1],
                ['table' => 'blog', 'column' => 'tag_' . $objWbSession->get('language'), 'value' => '', 'comparison' => '!='],
            ]
        ]);
    }

    function buildArr($result, $objWbSession, $objWbTranslation)
    {
        $tag = 'tag_' . $objWbSession->get('language');
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
        $objWbUrl = new WbUrl();
        $string = '<ul class="tag-list">';

        foreach ($arr as $value => $key) {
            $string .= '
                <li>
                    <div class="tag-item tag-grey">
                        <a href="' . $objWbUrl->getUrlPage() . 'blog-search/&q=' . $value . '" class="link link-grey">
                            <span class="text">' . $value . '</span>
                        </a>
                    </div>
                </li>
            ';
        }

        $string .= '</ul>';

        return $string;
    }
}
