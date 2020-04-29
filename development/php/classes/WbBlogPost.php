<?php

class WbBlogPost
{
    function getPost()
    {
        $objWbUrl = new WbUrl();
        $id = $objWbUrl->getUrlParameters()['id'];
        $this->updatePostView($id);
        return $this->getPostQuery($id);
    }

    function updatePostView($id)
    {
        $objWbQuery = new WbQuery();

        $objWbQuery->unbind();
        $objWbQuery->populateArray([
            'table' => [['table' => 'blog']],
            'column' => [
                ['column' => 'view', 'value' => 'view + 1']
            ],
            'where' => [['table' => 'blog', 'column' => 'id', 'value' => $id]]
        ]);

        return $objWbQuery->update();
    }

    function getPostQuery($id)
    {
        $objWbQuery = new WbQuery();

        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'title_pt'],
                ['table' => 'blog', 'column' => 'title_en'],
                ['table' => 'blog', 'column' => 'content_pt'],
                ['table' => 'blog', 'column' => 'content_en'],
                ['table' => 'blog', 'column' => 'tag_pt'],
                ['table' => 'blog', 'column' => 'tag_en'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1],
                ['table' => 'blog', 'column' => 'id', 'value' => $id],
            ]
        ]);

        $query = $objWbQuery->select();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function buildTag($target)
    {
        if ($target !== '') {
            $explode = explode('#', $target);
            $length = count($explode);
            $string = '';

            $string .= '<ul class="tag-list">';
            for ($i = 0; $i < $length; $i++) {
                if ($explode[$i] !== '') {
                    $string .= '<li>';
                    $string .= '    <div class="tag-item tag-grey">';
                    $string .= '        <span class="text">' . $explode[$i] . '</span>';
                    $string .= '    </div>';
                    $string .= '</li>';
                }
            }
            $string .= '</ul>';

            return $string;
        }
    }
}
