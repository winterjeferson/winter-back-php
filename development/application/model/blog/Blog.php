<?php

namespace Application\Model\Blog;

use Application\Core\Session;
use Application\Core\Connection;

require __DIR__ . '/Tag.php';

class Blog
{
    private $postListLimitLastPost = 10;
    private $postListLimitMostViewed = 3;
    private $prefixPagination = 'blogLoadMoreCurrent';
    private $prefixLoadMore = 'blogIsLoadMore';
    private $suffixPaginationLastPost = 'pageBlogLastPost';
    private $suffixPaginationMostViewed = 'pageBlogMostViewed';

    public function __construct()
    {
        $this->objSession = new Session();
        $this->objTag = new Tag();
        $this->language = $this->objSession->get('language');
        $this->resetSession();
    }

    function build()
    {
        $arr = [
            'listLasPost' => $this->getList('LastPost'),
            'listMostViewed' => $this->getList('MostViewed'),
            'listTag' => $this->objTag->getList(),
            'btLoadMore' => $this->buildLoadMoreButton('LastPost'),
            'btMostViewed' => $this->buildLoadMoreButton('MostViewed'),
        ];

        return $arr;
    }

    function getList($target)
    {
        $queryAdd = $this->{'getListQuery' . $target}();
        $query = $this->getListQueryDefault($queryAdd);
        $this->buildLoadMore($target, $query);
        $html = $this->buildHtml($query);

        return $html;
    }

    function getListQueryDefault($queryAdd)
    {
        $connection = Connection::open();
        $sql = 'SELECT 
                    id
                    ,title_' . $this->language . '
                    ,title_' . $this->language . '
                    ,url_' . $this->language . '
                    ,content_' . $this->language . '
                    ,date_post_' . $this->language . '
                    ,date_edit_' . $this->language . '
                    ,thumbnail
                FROM blog
                WHERE
                    active = 1
                    ' . $queryAdd . '
        ';

        $query = $connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($connection::FETCH_ASSOC);

        return $result;
    }

    function getListQueryLastPost()
    {
        return '
            ORDER BY
                date_post_' . $this->language . '
                DESC
            LIMIT
                ' . $this->objSession->get($this->prefixPagination . $this->suffixPaginationLastPost) . '
                , ' . $this->postListLimitLastPost . '
        ';
    }

    function getListQueryMostViewed()
    {
        return '
            ORDER BY
                view DESC
            LIMIT
                ' . $this->objSession->get($this->prefixPagination . $this->suffixPaginationMostViewed) . '
                , ' . $this->postListLimitMostViewed . '
        ';
    }

    function buildHtml($query)
    {
        $string = '';

        if (count($query) === 0) {
            $string .= '<h2 class="color-red text-center">' . $this->objWbSession->getArray('translation', 'noResult') . '</h2>';
        } else {
            foreach ($query as $key => $value) {
                $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? $value['thumbnail'] : 'default.jpg';
                $dateEdit = $value['date_edit_' . $this->language];
                $datePost = $value['date_post_' . $this->language];
                $ternaryDate =  $datePost !==  $dateEdit ?  '<br/>' . $this->objWbSession->getArray('translation', 'editedOn') . ' ' . $dateEdit : '';
                $url = $this->language . '/blog/post/' . $value['id'] . '/' . $value['url_' . $this->language] . '/';
                $removeImage = strip_tags($value['content_' . $this->language]);

                $string .= '
                    <article>
                        <div class="blog-list-image">
                            <img class="img-responsive" data-src="assets/img/blog/thumbnail/' . $thumbnail . '" alt="image" data-lazy-load="true">
                        </div>
                        <div class="blog-list-text">
                            <a href="' . $url . '" class="link link-blue">
                                <h2 class="blog-list-title">
                                ' . encode($value['title_' . $this->language]) . '
                                </h2>
                            </a>
                            <p class="text">
                            ' . substr($removeImage, 0, 80) . '...
                            </p>
                            <small class="date">
                            ' . $value['date_post_' . $this->language] . '
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
        $this->objSession->set($this->prefixPagination  . $this->suffixPaginationLastPost, 0);
        $this->objSession->set($this->prefixPagination  . $this->suffixPaginationMostViewed, 0);
    }

    function setSession($target)
    {
        $this->objSession->set(
            $this->prefixPagination  . $this->{'suffixPagination' . $target},
            $this->objSession->get($this->prefixPagination . $this->{'suffixPagination' . $target}) + $this->{'postListLimit' . $target}
        );
    }

    function buildLoadMore($target, $result)
    {
        $count = count($result);

        if ($count >= $this->{'postListLimit' . ucfirst($target)}) {
            $this->objSession->set($this->prefixLoadMore . $target, true);
        } else {
            $this->objSession->set($this->prefixLoadMore . $target, false);
        }
    }

    function buildLoadMoreButton($target)
    {
        if ($this->objSession->get($this->prefixLoadMore . $target)) {
            $string = '
                <button type="button" class="bt bt-fu bt-blue" data-id="loadMore">
                    ' . $this->objSession->getArray('translation', 'loadMore') . '
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
