<?php

namespace Application\Model\Blog;

class Blog
{
    private $postListLimitTag = 100000000;
    private $postListLimitLastPost = 10;
    private $postListLimitMostViewed = 3;
    private $prefixPagination = 'blogLoadMoreCurrent';
    private $prefixLoadMore = 'blogIsLoadMore';
    private $suffixPaginationLastPost = 'pageBlogLastPost';
    private $suffixPaginationMostViewed = 'pageBlogMostViewed';

    public function __construct($isLoadMore = false)
    {
        require_once __DIR__ . '/../../core/Session.php';
        require_once __DIR__ . '/../../core/Query.php';
        require_once __DIR__ . '/../../core/Connection.php';
        require_once __DIR__ . '/Tag.php';

        $this->objSession = new \Application\Core\Session();
        $this->objQuery = new \Application\Core\Query();
        $this->objTag = new Tag();
        $this->language = $this->objSession->get('language');

        if (!$isLoadMore) {
            $this->resetSession();
        }
    }

    function build()
    {
        $listLastPost = $this->getList('LastPost');
        $listMostViewed = $this->getList('MostViewed');
        $listDecodeLastPost = json_decode($listLastPost, true);
        $listDecodeMostViewed = json_decode($listMostViewed, true);

        $arr = [
            'listLasPost' => $listDecodeLastPost['html'],
            'listMostViewed' => $listDecodeMostViewed['html'],
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

        return json_encode(['html' => $html, 'loadMore' => $this->objSession->get($this->prefixLoadMore . $target)]);
    }

    function getListQueryDefault($queryAdd)
    {
        return $this->objQuery->build($this->getListQueryDefaultQuery($queryAdd));
    }

    function getListQueryDefaultQuery($queryAdd)
    {
        $connection = \Application\Core\Connection::open();
        $sql = "SELECT 
                      id
                    , title_{$this->language}
                    , url_{$this->language}
                    , content_{$this->language}
                    , date_post_{$this->language}
                    , date_edit_{$this->language}
                    , thumbnail
                FROM blog
                WHERE
                    active = 1
                AND 
                    content_{$this->language} != ''
                {$queryAdd}
        ";

        $query = $connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($connection::FETCH_ASSOC);

        return $result;
    }

    function getListQueryLastPost()
    {
        return "
            ORDER BY
                date_post_{$this->language}
                DESC
            LIMIT
                  {$this->objSession->get($this->prefixPagination .$this->suffixPaginationLastPost)}
                , {$this->postListLimitLastPost}
        ";
    }

    function getListQueryTag()
    {
        $tag = $this->objSession->getArray('arrUrl', 'paramether0');

        if (is_null($tag)) {
            return;
        }

        return "AND
                    tag_{$this->language} LIKE '%{$tag}%'
        ";
    }

    function getListQueryMostViewed()
    {
        return "
            ORDER BY
                view DESC
            LIMIT
                  {$this->objSession->get($this->prefixPagination .$this->suffixPaginationMostViewed)}
                , {$this->postListLimitMostViewed}
            ";
    }

    function buildHtml($query)
    {
        $string = '';

        foreach ($query as $key => $value) {
            $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? 'dynamic/blog/thumbnail/' . $value['thumbnail'] : 'blog-thumbnail.jpg';
            $dateEdit = $value['date_edit_' . $this->language];
            $datePost = $value['date_post_' . $this->language];
            $ternaryDate =  $datePost !==  $dateEdit ?  '<br/>' . $this->objSession->getArray('translation', 'editedOn') . ' ' . $dateEdit : '';
            $url = $this->language . '/blog/post/' . $value['id'] . '/' . $value['url_' . $this->language] . '/';
            $removeImage = strip_tags($value['content_' . $this->language]);

            $string .= '
                    <a href="' . $url . '" class="link">
                        <div class="blog-list-image">
                            <img class="img-responsive" data-src="assets/img/' . $thumbnail . '" alt="image" data-lazy-load="true">
                        </div>
                        <div class="blog-list-text">
                                <h2 class="blog-list-title">
                                ' . encode($value['title_' . $this->language]) . '
                                </h2>
                            <p class="text">
                            ' . substr($removeImage, 0, 80) . '...
                            </p>
                            <small class="date">
                            ' . $value['date_post_' . $this->language] . '
                            ' . $ternaryDate . '
                            </small>
                        </div>
                    </a>
                ';
        }

        return removeLineBreak($string);
    }

    function resetSession()
    {
        $this->objSession->set($this->prefixPagination  . $this->suffixPaginationLastPost, 0);
        $this->objSession->set($this->prefixPagination  . $this->suffixPaginationMostViewed, 0);
    }

    function setSession($target)
    {
        $valueCurrent = $this->objSession->get($this->prefixPagination . $this->{'suffixPagination' . $target});
        $valueNew = $this->{'postListLimit' . $target};

        $this->objSession->set(
            $this->prefixPagination  . $this->{'suffixPagination' . $target},
            $valueCurrent + $valueNew
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

            return removeLineBreak($string);
        }
    }

    function buildLoadMoreButtonClick()
    {
        $target = filter_input(INPUT_POST, 'target', FILTER_SANITIZE_EMAIL);

        $this->setSession($target);

        return $this->getList(lcfirst($target));
    }
}
