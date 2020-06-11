<?php

namespace Application\Model\Admin;

use Application\Core\Session;
use Application\Core\Connection;

require_once __DIR__ . '/Login.php';

class Blog
{
    private $sqlTable = 'blog';

    public function __construct()
    {
        $this->objLogin = new Login();
        $this->objWbSession = new Session();
        $this->language = $this->objWbSession->get('language');
    }

    function build()
    {
        $this->objLogin->verifyLogin();
        $list = $this->getList();
        $arrList = $this->separateList($list);

        // var_dump($arrList['inactive']);
        // exit;

        $arr = [
            'language' => $this->language,
            'listActive' => $arrList['active'],
            'listInactive' => $arrList['inactive'],
        ];

        return $arr;
    }

    function getList()
    {
        // $objWbQuery->populateArray([
        //     'column' => [
        //         ['table' => $this->sqlTable, 'column' => '*']
        //     ],
        //     'table' => [['table' => $this->sqlTable]],
        //     'order' => [
        //         ['column' => 'id', 'order' => 'DESC']
        //     ],
        // ]);

        $connection = Connection::open();
        $sql = 'SELECT 
                    *
                FROM 
                    blog
                OREDER 
                    -- by id DESC
        ';

        $query = $connection->prepare($sql);
        $query->execute();
        $result = $query->fetchAll($connection::FETCH_ASSOC);

        return $result;
    }

    function separateList($arrList)
    {
        $arrActive = [];
        $arrInactive = [];

        foreach ($arrList as $key => &$value) {
            if ($value['active'] === '1') {
                $arrActive[] = $value;
            } else {
                $arrInactive[] = $value;
            }
        }

        return [
            'active' => $arrActive,
            'inactive' => $arrInactive,
        ];
    }

    // function buildList($status)
    // {
    // $active = $status === 'active' ? 1 : 0;
    // $string = '';
    // $objWbQuery = new WbQuery();
    // $objTheme = new Theme();
    // $objWbSession = new WbSession();

    // $this->buildListSql($objWbQuery);

    // $objWbQuery->populateArray([
    //     'where' => [
    //         ['table' => $this->sqlTable, 'column' => 'active', 'value' => $active]
    //     ]
    // ]);

    // $query = $objWbQuery->select();
    // $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($queryResult as $key => $value) {
    //     $string .= $this->buildListHTML($value, $status, $objTheme, $objWbSession);
    // }

    // return $string;
    // }

    // function buildListSql($objWbQuery)
    // {
    //     $objWbQuery->populateArray([
    //         'column' => [
    //             ['table' => $this->sqlTable, 'column' => '*']
    //         ],
    //         'table' => [['table' => $this->sqlTable]],
    //         'order' => [
    //             ['column' => 'id', 'order' => 'DESC']
    //         ],
    //     ]);
    // }

    // function buildListHTML($value, $status, $objTheme, $objWbSession)
    // {
    //     $objWbSession = new WbSession();
    //     $objWbHelp = new WbHelp();

    //     $thumbnail = !is_null($value['thumbnail']) && $value['thumbnail'] !== '' ? $value['thumbnail'] : 'default.jpg';
    //     $explodeTag = explode('#',  $objWbHelp->encode($value['tag_' . $objWbSession->get('language')]));
    //     $lengthExplode = count($explodeTag);
    //     $string = '';

    //     $string .= '
    //         <tr>
    //             <td class="minimum">' . $value['id'] . '</td>
    //             <td class="minimum"><img data-src="assets/img/blog/thumbnail/' . $thumbnail . '" data-lazy-load="true" alt="' . $objWbSession->getArray('translation', 'thumbnail') . '"></td>
    //             <td><b>' . $objWbHelp->encode($value['title_' . $objWbSession->get('language')]) . '</b></td>
    //             <td><div class="td-wrapper">' . $objWbHelp->encode(strip_tags($value['content_' . $objWbSession->get('language')])) . '</div></td>
    //             <td class="minimum">' . $value['url_' . $objWbSession->get('language')] . '</td>
    //             <td class="minimum">
    //     ';

    //     for ($i = 0; $i < $lengthExplode; $i++) {
    //         if ($explodeTag[$i] !== '') {
    //             $string .= '<small>#' . $explodeTag[$i] . '</small>';
    //             $string .= '<br/>';
    //         }
    //     }

    //     $string .= '
    //             </td>
    //             <td class="minimum"><small>' . $value['date_post_' . $objWbSession->get('language')] . '</small></td>
    //             <td class="minimum"><small>' . $value['date_edit_' . $objWbSession->get('language')] . '</small></td>
    //             <td class="minimum">
    //                 <nav class="menu menu-horizontal">
    //                     <ul>
    //                         <li>' . $objTheme->buildHTMLBt('edit', $value['id']) . '</li>
    //                         <li>' . $objTheme->buildHTMLBt($status, $value['id']) . '</li>
    //                         <li>' . $objTheme->buildHTMLBt('delete', $value['id']) . '</li>
    //                     </ul>
    //                 </nav>
    //             </td>
    //         </tr>
    //     ';

    //     return $string;
    // }

    function doUpdate()
    {
        $objWbDate = new WbDate();
        $objWbQuery = new WbQuery();
        $objWbHelp = new WbHelp();
        $objWbSiteMap = new WbSiteMap();

        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $titlePt = filter_input(INPUT_POST, 'titlePt', FILTER_DEFAULT);
        $titleEn = filter_input(INPUT_POST, 'titleEn', FILTER_DEFAULT);
        $urlPt = filter_input(INPUT_POST, 'urlPt', FILTER_DEFAULT);
        $urlEn = filter_input(INPUT_POST, 'urlEn', FILTER_DEFAULT);
        $contentPt = filter_input(INPUT_POST, 'contentPt', FILTER_DEFAULT);
        $contentEn = filter_input(INPUT_POST, 'contentEn', FILTER_DEFAULT);
        $tagPt = $this->validateTag(filter_input(INPUT_POST, 'tagPt', FILTER_DEFAULT));
        $tagEn = $this->validateTag(filter_input(INPUT_POST, 'tagEn', FILTER_DEFAULT));
        $datePostPt = filter_input(INPUT_POST, 'datePostPt', FILTER_DEFAULT);
        $datePostEn = filter_input(INPUT_POST, 'datePostEn', FILTER_DEFAULT);
        $dateEditPt = filter_input(INPUT_POST, 'dateEditPt', FILTER_DEFAULT);
        $dateEditEn = filter_input(INPUT_POST, 'dateEditEn', FILTER_DEFAULT);
        $thumbnail = filter_input(INPUT_POST, 'thumbnail', FILTER_DEFAULT);

        $objWbQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'column' => [
                ['column' => 'title_pt', 'value' => $objWbHelp->encode($titlePt)],
                ['column' => 'title_en', 'value' => $objWbHelp->encode($titleEn)],
                ['column' => 'url_pt', 'value' => $urlPt],
                ['column' => 'url_en', 'value' => $urlEn],
                ['column' => 'content_pt', 'value' => $objWbHelp->encode($contentPt)],
                ['column' => 'content_en', 'value' => $objWbHelp->encode($contentEn)],
                ['column' => 'tag_pt', 'value' => $tagPt],
                ['column' => 'tag_en', 'value' => $tagEn],
                ['column' => 'date_post_pt', 'value' => $objWbDate->buildDate($datePostPt)],
                ['column' => 'date_post_en', 'value' => $objWbDate->buildDate($datePostEn)],
                ['column' => 'date_edit_pt', 'value' => $objWbDate->buildDate($dateEditPt)],
                ['column' => 'date_edit_en', 'value' => $objWbDate->buildDate($dateEditEn)],
                ['column' => 'thumbnail', 'value' => $thumbnail],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWbQuery->update();
        $objWbSiteMap->build();
        return $query;
    }

    function doSave()
    {
        $objWbDate = new WbDate();
        $objWbQuery = new WbQuery();
        $objWbHelp = new WbHelp();
        $objWbSiteMap = new WbSiteMap();

        $titlePt = filter_input(INPUT_POST, 'titlePt', FILTER_DEFAULT);
        $titleEn = filter_input(INPUT_POST, 'titleEn', FILTER_DEFAULT);
        $urlPt = filter_input(INPUT_POST, 'urlPt', FILTER_DEFAULT);
        $urlEn = filter_input(INPUT_POST, 'urlEn', FILTER_DEFAULT);
        $contentPt = filter_input(INPUT_POST, 'contentPt', FILTER_DEFAULT);
        $contentEn = filter_input(INPUT_POST, 'contentEn', FILTER_DEFAULT);
        $tagPt = $this->validateTag(filter_input(INPUT_POST, 'tagPt', FILTER_DEFAULT));
        $tagEn = $this->validateTag(filter_input(INPUT_POST, 'tagEn', FILTER_DEFAULT));
        $datePostPt = filter_input(INPUT_POST, 'datePostPt', FILTER_DEFAULT);
        $datePostEn = filter_input(INPUT_POST, 'datePostEn', FILTER_DEFAULT);
        $dateEditPt = filter_input(INPUT_POST, 'dateEditPt', FILTER_DEFAULT);
        $dateEditEn = filter_input(INPUT_POST, 'dateEditEn', FILTER_DEFAULT);
        $thumbnail = filter_input(INPUT_POST, 'thumbnail', FILTER_DEFAULT);

        $objWbQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'column' => [
                ['column' => 'title_pt', 'value' => $objWbHelp->encode($titlePt)],
                ['column' => 'title_en', 'value' => $objWbHelp->encode($titleEn)],
                ['column' => 'url_pt', 'value' => $urlPt],
                ['column' => 'url_en', 'value' => $urlEn],
                ['column' => 'content_pt', 'value' => $objWbHelp->encode($contentPt)],
                ['column' => 'content_en', 'value' => $objWbHelp->encode($contentEn)],
                ['column' => 'tag_pt', 'value' => $tagPt],
                ['column' => 'tag_en', 'value' => $tagEn],
                ['column' => 'date_post_pt', 'value' => $objWbDate->buildDate($datePostPt)],
                ['column' => 'date_post_en', 'value' => $objWbDate->buildDate($datePostEn)],
                ['column' => 'date_edit_pt', 'value' => $objWbDate->buildDate($dateEditPt)],
                ['column' => 'date_edit_en', 'value' => $objWbDate->buildDate($dateEditEn)],
                ['column' => 'thumbnail', 'value' => $thumbnail],

                ['column' => 'active', 'value' => 1],
                ['column' => 'view', 'value' => 0],
            ]
        ]);

        $query = $objWbQuery->insert();
        $objWbSiteMap->build();
        return $query;
    }

    function doModify()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $value = $status === 'inactivate' ? 0 : 1;

        $objWbQuery = new WbQuery();
        $objWbQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'column' => [
                ['column' => 'active', 'value' => $value],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWbQuery->update();

        return $query;
    }

    function doDelete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        $objWbQuery = new WbQuery();
        $objWbQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWbQuery->delete();
        return $query;
    }

    function editLoadData()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $objWbQuery = new WbQuery();
        $objHelp = new WbHelp();
        $objWbQuery->populateArray([
            'column' => [
                ['table' => $this->sqlTable, 'column' => 'title_pt'],
                ['table' => $this->sqlTable, 'column' => 'title_en'],
                ['table' => $this->sqlTable, 'column' => 'url_pt'],
                ['table' => $this->sqlTable, 'column' => 'url_en'],
                ['table' => $this->sqlTable, 'column' => 'content_pt'],
                ['table' => $this->sqlTable, 'column' => 'content_en'],
                ['table' => $this->sqlTable, 'column' => 'tag_pt'],
                ['table' => $this->sqlTable, 'column' => 'tag_en'],
                ['table' => $this->sqlTable, 'column' => 'date_post_pt'],
                ['table' => $this->sqlTable, 'column' => 'date_post_en'],
                ['table' => $this->sqlTable, 'column' => 'date_edit_pt'],
                ['table' => $this->sqlTable, 'column' => 'date_edit_en'],
                ['table' => $this->sqlTable, 'column' => 'id'],
                ['table' => $this->sqlTable, 'column' => 'thumbnail'],
            ],
            'table' => [['table' => $this->sqlTable]],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]],
            'limit' => [['offset' => 1]],
        ]);


        $query = $objWbQuery->select();
        $queryResult = $query->fetch(PDO::FETCH_ASSOC);

        return $objHelp->buildJson($queryResult);
    }

    function validateTag($target)
    {
        $verifyString = substr($target, -1);

        if ($verifyString === '#') {
            return substr_replace($target, '', -1);
        }

        return $target;
    }
}
