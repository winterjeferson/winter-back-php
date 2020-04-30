<?php

class WbBlogSearch
{
    function search()
    {
        $q = filter_input(INPUT_GET, 'q', FILTER_DEFAULT);

        return $this->searchQuery($q);
    }

    function searchQuery($q)
    {
        $objWbQuery = new WbQuery();
        $objWbSession = new WbSession();
        $objWbQuery->unbind();

        $language = $objWbSession->get('language');

        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'title_' . $language],
                ['table' => 'blog', 'column' => 'content_' . $language],
                ['table' => 'blog', 'column' => 'tag_' . $language],
                ['table' => 'blog', 'column' => 'date_post_' . $language],
                ['table' => 'blog', 'column' => 'date_edit_' . $language],
                ['table' => 'blog', 'column' => 'url_' . $language],
                ['table' => 'blog', 'column' => 'thumbnail'],
                ['table' => 'blog', 'column' => 'id'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'content_' . $language, 'value' => $q, 'comparison' => ' LIKE "%', 'comparisonEnd' => '%"'],
            ]
        ]);

        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->searchResult($result, $objWbSession);
    }

    function searchResult($query, $objWbSession)
    {
        $objWbTranslation = new WbTranslation();
        $objWbBlogList = new WbBlogList();

        return $objWbBlogList->buildHtml($query, $objWbSession, $objWbTranslation);
    }
}
