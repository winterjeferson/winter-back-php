<?php

class WbBlog
{
    private $postListLimitLastPost = 5;
    private $postListLimitMostViewed = 3;
    private $prefixPagination = 'blog_load_more_current_';
    private $suffixPaginationLastPost = 'page_blog_last_post';
    private $suffixPaginationMostViewed = 'page_blog_most_viewed';

    //////////////////////////////////////////////////////////////////////////////// POST

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

    //////////////////////////////////////////////////////////////////////////////// POST LIST

    function getPostList($target)
    {
        $objWbQuery = new WbQuery();

        $objWbQuery->populateArray([
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

        $this->getPostListTarget($objWbQuery, $target);
        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->getPostListBuildLoadMore($target, $result);
        return $result;
    }

    function getPostListBuildLoadMore($target, $result)
    {
        $objWbSession = new WbSession();
        $count = count($result);

        switch ($target) {
            case 'lastPost':
                if ($count >= $this->postListLimitLastPost) {
                    $objWbSession->set('blog_is_load_more_last_post', true);
                } else {
                    $objWbSession->set('blog_is_load_more_last_post', false);
                }
                break;
            case 'mostViewed':
                if ($count >= $this->postListLimitMostViewed) {
                    $objWbSession->set('blog_is_load_more_most_viewed', true);
                } else {
                    $objWbSession->set('blog_is_load_more_most_viewed', false);
                }
                break;
        }
    }

    function buildLoadMoreButton($target)
    {
        $objWbSession = new WbSession();

        switch ($target) {
            case 'lastPost':
                if (!$objWbSession->get('blog_is_load_more_last_post')) {
                    return;
                }
                break;
            case 'mostViewed':
                if (!$objWbSession->get('blog_is_load_more_most_viewed')) {
                    return;
                }
                break;
        }

        return $this->buildLoadMoreButtonHTML($objWbSession);
    }

    function buildLoadMoreButtonHTML($objWbSession)
    {
        $string = '';

        $string .= '<div class="row">';
        $string .= '    <div class="col-es-12">';
        $string .= '        <button type="button" class="bt bt-fu bt-blue" data-id="laod_more">';
        $string .= $objWbSession->getArray('translation', 'load_more');
        $string .= '        </button>';
        $string .= '    </div>';
        $string .= '</div>';

        return $string;
    }

    function getPostListTarget($objWbQuery, $target)
    {
        switch ($target) {
            case 'lastPost':
                $this->getPostListTargetLastPost($objWbQuery);
                break;
            case 'mostViewed':
                $this->getPostListTargetMostViewed($objWbQuery);
                break;
        }
    }

    function getPostListTargetLastPost($objWbQuery)
    {
        $objWbSession = new WbSession();

        $objWbQuery->populateArray([
            'order' => [
                ['column' => 'date_post_' . $objWbSession->get('language'), 'order' => 'DESC']
            ],
            'limit' => [
                ['initial' => $objWbSession->get($this->prefixPagination . $this->suffixPaginationLastPost)],
                ['offset' => $this->postListLimitLastPost]
            ],
        ]);
    }

    function getPostListTargetMostViewed($objWbQuery)
    {
        $objWbSession = new WbSession();

        $objWbQuery->populateArray([
            'order' => [
                ['column' => 'view', 'order' => 'DESC']
            ],
            'limit' => [
                ['initial' => $objWbSession->get($this->prefixPagination . $this->suffixPaginationMostViewed)],
                ['offset' =>  $this->postListLimitMostViewed]
            ],
        ]);
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
        $objWbTranslation = new WbTranslation();
        $objWbSession = new WbSession();

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
            $string .= '        <a href="' . $objWbTranslation->getLanguage() . '/blog-post/' . $value['id'] . '/' . $value['url_' . $objWbTranslation->getLanguage()] . '/" class="link link-blue">';
            $string .= '            <h2 class="blog-list-title">';
            $string .= utf8_encode($value['title_' . $objWbTranslation->getLanguage()]);
            $string .= '            </h2>';
            $string .= '        </a>';
            $string .= '        <small class="color-grey">';
            $string .= $value['date_post_' . $objWbTranslation->getLanguage()];

            if ($value['date_post_' . $objWbTranslation->getLanguage()] !== $value['date_edit_' . $objWbTranslation->getLanguage()]) {
                $string .=  '<br/>';
                $string .=  $objWbSession->getArray('translation', 'edited_on') . ' ' . $value['date_edit_' . $objWbTranslation->getLanguage()];
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
        $target = filter_input(INPUT_POST, 'target', FILTER_SANITIZE_EMAIL);

        switch ($target) {
            case 'page_blog_last_post':
                $return = $this->buildBlogPost('lastPost');
                break;
            case 'page_blog_most_viewed':
                $return = $this->buildBlogPost('mostViewed');
                break;
        }

        return $return;
    }

    function loadMoreSetLast($target)
    {
        switch ($target) {
            case 'page_blog_last_post':
                $this->loadMoreSetLastSession($target, $this->postListLimitLastPost, false);
                break;
            case 'page_blog_most_viewed':
                $this->loadMoreSetLastSession($target, $this->postListLimitMostViewed, false);
                break;
            default:
                $this->loadMoreSetLastSession($this->suffixPaginationLastPost, $this->postListLimitLastPost, true);
                $this->loadMoreSetLastSession($this->suffixPaginationMostViewed, $this->postListLimitMostViewed, true);
                break;
        }
    }

    function loadMoreSetLastSession($target, $value, $isReset)
    {
        $objWbSession = new WbSession();

        if ($isReset) {
            $objWbSession->set($this->prefixPagination  . $target, 0);
        } else {
            $objWbSession->set($this->prefixPagination  . $target, $objWbSession->get($this->prefixPagination  . $target) + $value);
        }
    }
}
