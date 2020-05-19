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

        $this->getListQueryDefault($objWbQuery, $objWbSession);
        $this->{'getListQuery' . ucfirst($target)}($objWbQuery, $objWbSession);
        $query = $objWbQuery->select();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->buildLoadMore($target, $result, $objWbSession);
        $html = $this->buildHtml($result, $objWbSession, $objWbTranslation);

        return json_encode(['html' => $html, 'loadMore' => $objWbSession->get($this->prefixLoadMore . $target)]);
    }

    function getListQueryDefault($objWbQuery, $objWbSession)
    {
        $objWbQuery->populateArray([
            'column' => [
                ['table' => 'blog', 'column' => 'id'],
                ['table' => 'blog', 'column' => 'title_' . $objWbSession->get('language')],
                ['table' => 'blog', 'column' => 'url_' . $objWbSession->get('language')],
                ['table' => 'blog', 'column' => 'content_' . $objWbSession->get('language')],
                ['table' => 'blog', 'column' => 'date_post_' . $objWbSession->get('language')],
                ['table' => 'blog', 'column' => 'date_edit_' . $objWbSession->get('language')],
                ['table' => 'blog', 'column' => 'thumbnail'],
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
        $language = $objWbTranslation->getLanguage();

        if (count($query) === 0) {
            $string .= '<h2 class="color-red text-center">' . $objWbSession->getArray('translation', 'noResult') . '</h2>';
        } else {
            foreach ($query as $key => $value) {
                $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? $value['thumbnail'] : 'default.jpg';
                $dateEdit = $value['date_edit_' . $language];
                $datePost = $value['date_post_' . $language];
                $ternaryDate =  $datePost !==  $dateEdit ?  '<br/>' . $objWbSession->getArray('translation', 'editedOn') . ' ' . $dateEdit : '';
                $url = $language . '/blog-post/' . $value['id'] . '/' . $value['url_' . $language] . '/';
                $removeImage = strip_tags($value['content_' . $language]);

                $string .= '
                    <article>
                        <div class="blog-list-image">
                            <img class="img-responsive" data-src="assets/img/blog/thumbnail/' . $thumbnail . '" alt="image" data-lazy-load="true">
                        </div>
                        <div class="blog-list-text">
                            <a href="' . $url . '" class="link link-blue">
                                <h2 class="blog-list-title">
                                ' . $objWbHelp->encode($value['title_' . $language]) . '
                                </h2>
                            </a>
                            <p class="text">
                            ' . substr($removeImage, 0, 80) . '...
                            </p>
                            <small class="date">
                            ' . $value['date_post_' . $language] . '
                            ' . $ternaryDate . '
                            </small>
                        </div>
                    </article>
                ';
            }
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

        if ($objWbSession->get($this->prefixLoadMore . $target)) {
            $string = '
                <button type="button" class="bt bt-fu bt-blue" data-id="loadMore">
                    ' . $objWbSession->getArray('translation', 'loadMore') . '
                </button>
            ';

            return $string;
        }
    }


    function buildLoadMoreButtonClick()
    {
        $target = filter_input(INPUT_POST, 'target', FILTER_SANITIZE_EMAIL);

        $this->setSession($target);
        return $this->getList(lcfirst($target));
    }
}
