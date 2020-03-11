<?php

class WBPBlog
{

    public function __construct()
    {
    }

    //////////////////////////////////////////////////////////////////////////////// POST

    function getPost($target)
    {
        $objWBPUrl = new WBPUrl();
        $id = $objWBPUrl->getUrlParameters()['id'];
        $query = $this->getPostQuery($id);

        return utf8_encode($query[$target]);
    }

    function getPostQuery($id)
    {
        $objWBPQuery = new WBPQuery();

        $objWBPQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'title'],
                ['table' => 'blog', 'column' => 'content'],
                ['table' => 'blog', 'column' => 'tag'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1],
                ['table' => 'blog', 'column' => 'id', 'value' => $id],
            ]
        ]);

        $query = $objWBPQuery->select();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////////////////////////////// POST LIST

    function getPostList()
    {
        $objWBPQuery = new WBPQuery();

        $objWBPQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'id'],
                ['table' => 'blog', 'column' => 'title'],
                ['table' => 'blog', 'column' => 'url'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1]
            ],
            'order' => [
                ['column' => 'id', 'order' => 'DESC']
            ]
        ]);

        $query = $objWBPQuery->select();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function buildBlogTag($target)
    {
        $explode = $pieces = explode('/', $target);
        $length = count($explode);
        $string = '';

        $string .= '<ul class="tag-list">';
        for ($i = 0; $i < $length; $i++) {
            $string .= '<li>';
            $string .= '    <div class="tag-item tag-grey">';
            $string .= '        <span class="text">' . $explode[$i] . '</span>';
            $string .= '    </div>';
            $string .= '</li>';
        }
        $string .= '</ul>';

        return $string;
    }
}
