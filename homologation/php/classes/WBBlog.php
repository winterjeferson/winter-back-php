<?php

class WBBlog
{
    private $postListLimitLastPost = 10;
    private $postListLimitMostViewed = 3;

    public function __construct()
    {
    }

    //////////////////////////////////////////////////////////////////////////////// POST

    function getPost()
    {
        $objWBUrl = new WBUrl();
        $id = $objWBUrl->getUrlParameters()['id'];
        $this->updatePostView($id);
        return $this->getPostQuery($id);
    }

    function updatePostView($id)
    {
        $objWBQuery = new WBQuery();

        $objWBQuery->unbind();
        $objWBQuery->populateArray([
            'table' => [['table' => 'blog']],
            'column' => [
                ['column' => 'view', 'value' => 'view + 1']
            ],
            'where' => [['table' => 'blog', 'column' => 'id', 'value' => $id]]
        ]);

        return $objWBQuery->update();
    }

    function getPostQuery($id)
    {
        $objWBQuery = new WBQuery();

        $objWBQuery->populateArray([
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

        $query = $objWBQuery->select();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////////////////////////////// POST LIST

    function getPostList($target)
    {
        $objWBQuery = new WBQuery();

        $objWBQuery->populateArray([
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

        $this->getPostListTarget($objWBQuery, $target);
        $query = $objWBQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->getPostListBuildLoadMore($target, $result);
        return $result;
    }

    function getPostListBuildLoadMore($target, $result)
    {
        $objWBSession = new WBSession();
        $count = count($result);

        switch ($target) {
            case 'lastPost':
                if ($count >= $this->postListLimitLastPost) {
                    $objWBSession->set('blog_is_load_more_last_post', true);
                } else {
                    $objWBSession->set('blog_is_load_more_last_post', false);
                }
                break;
            case 'mostViewed':
                if ($count >= $this->postListLimitMostViewed) {
                    $objWBSession->set('blog_is_load_more_most_viewed', true);
                } else {
                    $objWBSession->set('blog_is_load_more_most_viewed', false);
                }
                break;
        }
    }

    function buildLoadMoreButton($target)
    {
        $objWBSession = new WBSession();

        switch ($target) {
            case 'lastPost':
                if (!$objWBSession->get('blog_is_load_more_last_post')) {
                    return;
                }
                break;
            case 'mostViewed':
                if (!$objWBSession->get('blog_is_load_more_most_viewed')) {
                    return;
                }
                break;
        }

        return $this->buildLoadMoreButtonHTML($objWBSession);
    }

    function buildLoadMoreButtonHTML($objWBSession)
    {
        $string = '';

        $string .= '<div class="row">';
        $string .= '    <div class="col-es-12">';
        $string .= '        <button type="button" class="bt bt-fu bt-blue" data-id="laod_more">';
        $string .= $objWBSession->getArray('translation', 'load_more');
        $string .= '        </button>';
        $string .= '    </div>';
        $string .= '</div>';

        return $string;
    }

    function getPostListTarget($objWBQuery, $target)
    {
        switch ($target) {
            case 'lastPost':
                $objWBQuery->populateArray([
                    'order' => [
                        ['column' => 'id', 'order' => 'DESC']
                    ],
                    'limit' => [['final' => $this->postListLimitLastPost]],
                ]);
                break;
            case 'mostViewed':
                $objWBQuery->populateArray([
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
        $objWBTranslation = new WBTranslation();
        $objWBSession = new WBSession();

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
            $string .= '        <a href="' . $objWBTranslation->getLanguage() . '/blog-post/' . $value['id'] . '/' . $value['url_' . $objWBTranslation->getLanguage()] . '/" class="link link-blue">';
            $string .= '            <h2 class="blog-list-title">';
            $string .= utf8_encode($value['title_' . $objWBTranslation->getLanguage()]);
            $string .= '            </h2>';
            $string .= '        </a>';
            $string .= '        <small class="color-grey">';
            $string .= $value['date_post_' . $objWBTranslation->getLanguage()];

            if ($value['date_post_' . $objWBTranslation->getLanguage()] !== $value['date_edit_' . $objWBTranslation->getLanguage()]) {
                $string .=  '<br/>';
                $string .=  $objWBSession->getArray('translation', 'edited_on') . ' ' . $value['date_edit_' . $objWBTranslation->getLanguage()];
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
        return 'loadMore';
    }
}
