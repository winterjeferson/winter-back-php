<?php

class WBPAdminBlog
{

    private $sqlTable = 'blog';

    public function __construct()
    {
    }

    function buildReport($status)
    {
        $active = $status === 'active' ? 1 : 0;
        $string = '';
        $objWBPQuery = new WBPQuery();
        $objTheme = new Theme();

        $this->buildReportSql($objWBPQuery);

        $objWBPQuery->populateArray([
            'where' => [
                ['table' => $this->sqlTable, 'column' => 'active', 'value' => $active]
            ]
        ]);

        $query = $objWBPQuery->select();
        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($queryResult as $key => $value) {
            $string .= $this->buildReportHTML($value, $status, $objTheme);
        }

        return $string;
    }

    function buildReportSql($objWBPQuery)
    {
        $objWBPQuery->populateArray([
            'column' => [
                ['table' => $this->sqlTable, 'column' => '*']
            ],
            'table' => [['table' => $this->sqlTable]],
            'order' => [
                ['column' => 'id', 'order' => 'DESC']
            ],
        ]);
    }

    function buildReportHTML($value, $status, $objTheme)
    {
        $string = '';

        $string .= '<tr>';
        $string .= '    <td class="minimum">' . $value['id'] . '</td>';
        $string .= '    <td class="minimum">' . $value['title_pt'] . '</td>';
        $string .= '    <td class="minimum">' . $value['title_en'] . '</td>';
        $string .= '    <td class="minimum"><div class="td-wrapper">' . utf8_encode(strip_tags($value['content_pt'])) . '</div></td>';
        $string .= '    <td class="minimum"><div class="td-wrapper">' . utf8_encode(strip_tags($value['content_en'])) . '</div></td>';
        $string .= '    <td class="minimum">' . $value['url_pt'] . '</td>';
        $string .= '    <td class="minimum">' . $value['url_en'] . '</td>';
        $string .= '    <td class="minimum">' . $value['tag_pt'] . '</td>';
        $string .= '    <td class="minimum">' . $value['tag_en'] . '</td>';
        $string .= '    <td class="minimum">';
        $string .= '        <nav class="menu menu-horizontal">';
        $string .= '            <ul>';
        $string .= '                <li>' . $objTheme->buildHTMLBt('edit', $value['id']) . '</li>';
        $string .= '                <li>' . $objTheme->buildHTMLBt($status, $value['id']) . '</li>';
        $string .= '                <li>' . $objTheme->buildHTMLBt('delete', $value['id']) . '</li>';
        $string .= '            </ul>';
        $string .= '        </nav>';
        $string .= '    </td>';
        $string .= '</tr>';

        return $string;
    }

    function doUpdate()
    {
        $objWBPQuery = new WBPQuery();

        $titlePt = filter_input(INPUT_POST, 'titlePt', FILTER_DEFAULT);
        $titleEn = filter_input(INPUT_POST, 'titleEn', FILTER_DEFAULT);
        $urlPt = filter_input(INPUT_POST, 'urlPt', FILTER_DEFAULT);
        $urlEn = filter_input(INPUT_POST, 'urlEn', FILTER_DEFAULT);
        $contentPt = filter_input(INPUT_POST, 'contentPt', FILTER_DEFAULT);
        $contentEn = filter_input(INPUT_POST, 'contentEn', FILTER_DEFAULT);
        $tagPt = $this->validateTag(filter_input(INPUT_POST, 'tagPt', FILTER_DEFAULT));
        $tagEn = $this->validateTag(filter_input(INPUT_POST, 'tagEn', FILTER_DEFAULT));
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objWBPQuery->populateArray([
            'column' => [
                ['column' => 'title_pt', 'value' => utf8_decode($titlePt)],
                ['column' => 'title_en', 'value' => utf8_decode($titleEn)],
                ['column' => 'url_pt', 'value' => $urlPt],
                ['column' => 'url_en', 'value' => $urlEn],
                ['column' => 'content_pt', 'value' => utf8_decode($contentPt)],
                ['column' => 'content_en', 'value' => utf8_decode($contentEn)],
                ['column' => 'tag_pt', 'value' => $tagPt],
                ['column' => 'tag_en', 'value' => $tagEn],
                ['column' => 'active', 'value' => 1],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWBPQuery->update();
        return $query;
    }

    function doRegister()
    {
        $objWBPQuery = new WBPQuery();

        $titlePt = filter_input(INPUT_POST, 'titlePt', FILTER_DEFAULT);
        $titleEn = filter_input(INPUT_POST, 'titleEn', FILTER_DEFAULT);
        $urlPt = filter_input(INPUT_POST, 'urlPt', FILTER_DEFAULT);
        $urlEn = filter_input(INPUT_POST, 'urlEn', FILTER_DEFAULT);
        $contentPt = filter_input(INPUT_POST, 'contentPt', FILTER_DEFAULT);
        $contentEn = filter_input(INPUT_POST, 'contentEn', FILTER_DEFAULT);
        $tagPt = $this->validateTag(filter_input(INPUT_POST, 'tagPt', FILTER_DEFAULT));
        $tagEn = $this->validateTag(filter_input(INPUT_POST, 'tagEn', FILTER_DEFAULT));

        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objWBPQuery->populateArray([
            'column' => [
                ['column' => 'title_pt', 'value' => utf8_decode($titlePt)],
                ['column' => 'title_en', 'value' => utf8_decode($titleEn)],
                ['column' => 'url_pt', 'value' => $urlPt],
                ['column' => 'url_en', 'value' => $urlEn],
                ['column' => 'content_pt', 'value' => utf8_decode($contentPt)],
                ['column' => 'content_en', 'value' => utf8_decode($contentEn)],
                ['column' => 'tag_pt', 'value' => $tagPt],
                ['column' => 'tag_en', 'value' => $tagEn],
                ['column' => 'active', 'value' => 1],
            ]
        ]);

        $query = $objWBPQuery->insert();
        return $query;
    }

    function doModify()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 'status', FILTER_DEFAULT);
        $value = $status === 'inactivate' ? 0 : 1;

        $objWBPQuery = new WBPQuery();
        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'column' => [
                ['column' => 'active', 'value' => $value],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWBPQuery->update();

        return $query;
    }

    function doDelete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        $objWBPQuery = new WBPQuery();
        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objWBPQuery->delete();
        return $query;
    }

    function editLoadData()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $objWBPQuery = new WBPQuery();
        $objWBPQuery->populateArray([
            'column' => [
                ['table' => $this->sqlTable, 'column' => 'title_pt'],
                ['table' => $this->sqlTable, 'column' => 'title_en'],
                ['table' => $this->sqlTable, 'column' => 'url_pt'],
                ['table' => $this->sqlTable, 'column' => 'url_en'],
                ['table' => $this->sqlTable, 'column' => 'content_pt'],
                ['table' => $this->sqlTable, 'column' => 'content_en'],
                ['table' => $this->sqlTable, 'column' => 'tag_pt'],
                ['table' => $this->sqlTable, 'column' => 'tag_en'],
                ['table' => $this->sqlTable, 'column' => 'id'],
            ],
            'table' => [['table' => $this->sqlTable]],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]],
            'limit' => [['final' => 1]],
        ]);

        $query = $objWBPQuery->select();
        $queryResult = $query->fetch(PDO::FETCH_ASSOC);

        return $objWBPQuery->returnJson($queryResult);
    }

    function validateTag($target)
    {
        $verifyString = substr($target, -1);

        if ($verifyString === '/') {
            return substr_replace($target, '', -1);
        }

        return $target;
    }
}
