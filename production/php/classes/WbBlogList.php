<?php

class WbBlogList
{
    private $postListLimitLastPost = 10;
    private $postListLimitMostViewed = 3;
    private $prefixPagination = 'blogLoadMoreCurrent';
    private $prefixLoadMore = 'blogIsLoadMore';
    private $suffixPaginationLastPost = 'pageBlogLastPost';
    private $suffixPaginationMostViewed = 'pageBlogMostViewed';

    function getList($target)
    {
        $objWbQuery = new WbQuery();
        $objWbSession = new WbSession();
        $objWbTranslation = new WbTranslation();

        $this->getListQueryDefault($objWbQuery);
        $this->{'getListQuery' . ucfirst($target)}($objWbQuery, $objWbSession);
        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->buildLoadMore($target, $result, $objWbSession);
        $html = $this->buildHtml($result, $objWbSession, $objWbTranslation);

        return json_encode(['html' => $html, 'loadMore' => $objWbSession->get($this->prefixLoadMore . $target)]);
    }

    function getListQueryDefault($objWbQuery)
    {
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
    }

    function getListQueryLastPost($objWbQuery, $objWbSession)
    {
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

    function getListQueryMostViewed($objWbQuery, $objWbSession)
    {
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

    function buildHtml($query, $objWbSession, $objWbTranslation)
    {
        $objWbHelp = new WbHelp();
        $string = '';

        foreach ($query as $key => $value) {
            $string .= '<article>';
            $string .= '    <div class="blog-list-image">';
            $string .= '        <img src="https://winterjeferson.github.io/winter-front/production/img/banner/1.png" alt="image">';
            $string .= '    </div>';
            $string .= '    <div class="blog-list-text">';
            $string .= '        <a href="' . $objWbTranslation->getLanguage() . '/blog-post/' . $value['id'] . '/' . $value['url_' . $objWbTranslation->getLanguage()] . '/" class="link link-blue">';
            $string .= '            <h2 class="blog-list-title">';
            $string .= $objWbHelp->encode($value['title_' . $objWbTranslation->getLanguage()]);
            $string .= '            </h2>';
            $string .= '        </a>';
            $string .= '        <small class="color-grey">';
            $string .= $value['date_post_' . $objWbTranslation->getLanguage()];

            if ($value['date_post_' . $objWbTranslation->getLanguage()] !== $value['date_edit_' . $objWbTranslation->getLanguage()]) {
                $string .=  '<br/>';
                $string .=  $objWbSession->getArray('translation', 'editedOn') . ' ' . $value['date_edit_' . $objWbTranslation->getLanguage()];
            }

            $string .= '        </small>';
            $string .= '    </div>';
            $string .= '</article>';
        }

        return $string;
    }

    function resetSession()
    {
        $objWbSession = new WbSession();

        $objWbSession->set($this->prefixPagination  . $this->suffixPaginationLastPost, 0);
        $objWbSession->set($this->prefixPagination  . $this->suffixPaginationMostViewed, 0);
    }

    function setSession($target)
    {
        $objWbSession = new WbSession();

        $objWbSession->set(
            $this->prefixPagination  . $this->{'suffixPagination' . $target},
            $objWbSession->get($this->prefixPagination . $this->{'suffixPagination' . $target}) + $this->{'postListLimit' . $target}
        );
    }

    function buildLoadMore($target, $result, $objWbSession)
    {
        $count = count($result);

        if ($count >= $this->{'postListLimit' . ucfirst($target)}) {
            $objWbSession->set($this->prefixLoadMore . $target, true);
        } else {
            $objWbSession->set($this->prefixLoadMore . $target, false);
        }
    }

    function buildLoadMoreButton($target)
    {
        $objWbSession = new WbSession();
        $string = '';

        if (!$objWbSession->get($this->prefixLoadMore . $target)) {
            return;
        }

        $string .= '<button type="button" class="bt bt-fu bt-blue" data-id="loadMore">';
        $string .= $objWbSession->getArray('translation', 'loadMore');
        $string .= '</button>';

        return $string;
    }

    function buildLoadMoreButtonClick()
    {
        $target = filter_input(INPUT_POST, 'target', FILTER_SANITIZE_EMAIL);

        $this->setSession($target);
        return $this->getList(lcfirst($target));
    }
}
