<?php

class WBPBlog
{
    private $postListLimitLastPost = 10;
    private $postListLimitMostViewed = 3;

    public function __construct()
    {
    }

    //////////////////////////////////////////////////////////////////////////////// POST

    function getPost()
    {
        $objWBPUrl = new WBPUrl();
        $id = $objWBPUrl->getUrlParameters()['id'];
        $this->updatePostView($id);
        return $this->getPostQuery($id);
    }

    function updatePostView($id)
    {
        $objWBPQuery = new WBPQuery();

        $objWBPQuery->unbind();
        $objWBPQuery->populateArray([
            'table' => [['table' => 'blog']],
            'column' => [
                ['column' => 'view', 'value' => 'view + 1']
            ],
            'where' => [['table' => 'blog', 'column' => 'id', 'value' => $id]]
        ]);

        return $objWBPQuery->update();
    }

    function getPostQuery($id)
    {
        $objWBPQuery = new WBPQuery();

        $objWBPQuery->populateArray([
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

        $query = $objWBPQuery->select();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////////////////////////////// POST LIST

    function getPostList($target)
    {
        $objWBPQuery = new WBPQuery();

        $objWBPQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'id'],
                ['table' => 'blog', 'column' => 'title_pt'],
                ['table' => 'blog', 'column' => 'title_en'],
                ['table' => 'blog', 'column' => 'url_pt'],
                ['table' => 'blog', 'column' => 'url_en'],
                ['table' => 'blog', 'column' => 'date_post_pt'],
                ['table' => 'blog', 'column' => 'date_post_en'],
                ['table' => 'blog', 'column' => 'date_edit_pt'],
                ['table' => 'blog', 'column' => 'date_edit_en'],
            ],
            'table' => [['table' => 'blog']],
            'where' => [
                ['table' => 'blog', 'column' => 'active', 'value' => 1]
            ]
        ]);

        $this->getPostListTarget($objWBPQuery, $target);
        $query = $objWBPQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->getPostListBuildLoadMore($target, $result);
        return $result;
    }

    function getPostListBuildLoadMore($target, $result)
    {
        $objWBPSession = new WBPSession();
        $count = count($result);

        switch ($target) {
            case 'lastPost':
                if ($count >= $this->postListLimitLastPost) {
                    $objWBPSession->set('blog_is_load_more_last_post', true);
                } else {
                    $objWBPSession->set('blog_is_load_more_last_post', false);
                }
                break;
            case 'mostViewed':
                if ($count >= $this->postListLimitMostViewed) {
                    $objWBPSession->set('blog_is_load_more_most_viewed', true);
                } else {
                    $objWBPSession->set('blog_is_load_more_most_viewed', false);
                }
                break;
        }
    }

    function buildLoadMoreButton($target)
    {
        $objWBPSession = new WBPSession();

        switch ($target) {
            case 'lastPost':
                if (!$objWBPSession->get('blog_is_load_more_last_post')) {
                    return;
                }
                break;
            case 'mostViewed':
                if (!$objWBPSession->get('blog_is_load_more_most_viewed')) {
                    return;
                }
                break;
        }

        return $this->buildLoadMoreButtonHTML($objWBPSession);
    }

    function buildLoadMoreButtonHTML($objWBPSession)
    {
        $string = '';

        $string .= '<div class="row">';
        $string .= '    <div class="col-es-12">';
        $string .= '        <button type="button" class="bt bt-fu bt-blue" data-id="laod_more">';
        $string .= $objWBPSession->getArray('translation', 'load_more');
        $string .= '        </button>';
        $string .= '    </div>';
        $string .= '</div>';

        return $string;
    }

    function getPostListTarget($objWBPQuery, $target)
    {
        switch ($target) {
            case 'lastPost':
                $objWBPQuery->populateArray([
                    'order' => [
                        ['column' => 'id', 'order' => 'DESC']
                    ],
                    'limit' => [['final' => $this->postListLimitLastPost]],
                ]);
                break;
            case 'mostViewed':
                $objWBPQuery->populateArray([
                    'order' => [
                        ['column' => 'view', 'order' => 'DESC']
                    ],
                    'limit' => [['final' => $this->postListLimitMostViewed]],
                ]);
                break;
        }
    }

    function buildBlogTag($target)
    {
        $explode = explode('/', $target);
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

    function buildBlogPost($target)
    {
        $string = '';
        $objWBPTranslation = new WBPTranslation();
        $objWBPSession = new WBPSession();

        if ($target === 'lastPost') {
            $query = $this->getPostList('lastPost');
        } else {
            $query = $this->getPostList('mostViewed');
        }

        foreach ($query as $key => $value) {
            $string .= '<article>';
            $string .= '    <div class="blog-list-image">';
            $string .= '        <img src="http://localhost/e/development/site/branches/framework/winter-front/homologation/img/banner/1.png" alt="image">';
            $string .= '    </div>';
            $string .= '    <div class="blog-list-text">';
            $string .= '        <a href="' . $objWBPTranslation->getLanguage() . '/blog-post/' . $value['id'] . '/' . $value['url_' . $objWBPTranslation->getLanguage()] . '/" class="link link-blue">';
            $string .= '            <h2 class="blog-list-title">';
            $string .= utf8_encode($value['title_' . $objWBPTranslation->getLanguage()]);
            $string .= '            </h2>';
            $string .= '        </a>';
            $string .= '        <small class="color-grey">';
            $string .= $value['date_post_' . $objWBPTranslation->getLanguage()];

            if ($value['date_post_' . $objWBPTranslation->getLanguage()] !== $value['date_edit_' . $objWBPTranslation->getLanguage()]) {
                $string .=  '<br/>';
                $string .=  $objWBPSession->getArray('translation', 'edited_on') . ' ' . $value['date_edit_' . $objWBPTranslation->getLanguage()];
            }

            $string .= '        </small>';
            $string .= '    </div>';
            $string .= '</article>';
        }

        return $string;
    }

    //////////////////////////////////////////////////////////////////////////////// LOAD MORE

    function loadMore()
    {
        return 'qqqqqqq';
    }
}
