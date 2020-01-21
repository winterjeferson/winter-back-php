<?php

class FrameworkBlog {

    public function __construct() {
        
    }

//////////////////////////////////////////////////////////////////////////////// POST

    function getPost($target) {
        $objFrameworkUrl = new FrameworkUrl();
        $id = $objFrameworkUrl->getUrlParameters()['id'];
        $query = $this->getPostQuery($id);

        return utf8_encode($query[$target]);
    }

    function getPostQuery($id) {
        $objFrameworkQuery = new FrameworkQuery();

        $objFrameworkQuery->populateArray([
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

        $query = $objFrameworkQuery->select();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

//////////////////////////////////////////////////////////////////////////////// POST LIST

    function getPostList() {
        return $this->getPostListQuery();
    }

    function getPostListQuery() {
        $objFrameworkQuery = new FrameworkQuery();

        $objFrameworkQuery->populateArray([
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

        $query = $objFrameworkQuery->select();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
