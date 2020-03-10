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

        $this->buildReportSql($objWBPQuery);

        $objWBPQuery->populateArray([
            'where' => [
                ['table' => $this->sqlTable, 'column' => 'active', 'value' => $active]
            ]
        ]);

        $query = $objWBPQuery->select();
        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($queryResult as $key => $value) {
            $string .= $this->buildReportHTML($value, $status);
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

    function buildReportHTML($value, $status)
    {
        $objWBPTheme = new WBPTheme();

        $string = '';

        $string .= '<tr>';
        $string .= '    <td class="minimum">';
        $string .= $value['id'];
        $string .= '    </td>';
        $string .= '    <td class="minimum">';
        $string .= $value['title'];
        $string .= '    </td>';
        $string .= '    <td>';
        $string .= '        <div class="td-wrapper">';
        $string .= utf8_encode(strip_tags($value['content']));
        $string .= '        </div>';
        $string .= '    </td>';
        $string .= '    <td class="minimum">';
        $string .= $value['url'];
        $string .= '    </td>';
        $string .= '    <td class="minimum">';
        $string .= $value['tag'];
        $string .= '    </td>';
        $string .= '    <td class="minimum">';
        $string .= '        <nav class="menu menu-horizontal">';
        $string .= '            <ul>';

        $string .= '                <li>';
        $string .= $objWBPTheme->buildHTMLBt('edit', $value['id']);
        $string .= '                </li>';

        $string .= '                <li>';
        $string .= $objWBPTheme->buildHTMLBt($status, $value['id']);
        $string .= '                </li>';

        $string .= '                <li>';
        $string .= $objWBPTheme->buildHTMLBt('delete', $value['id']);
        $string .= '                </li>';

        $string .= '            </ul>';
        $string .= '        </nav>';
        $string .= '    </td>';
        $string .= '</tr>';

        return $string;
    }

    function doUpdate()
    {
        $objWBPQuery = new WBPQuery();

        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $tag = $this->validateTag(filter_input(INPUT_POST, 'tag', FILTER_DEFAULT));
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objWBPQuery->populateArray([
            'column' => [
                ['column' => 'title', 'value' => utf8_decode($title)],
                ['column' => 'url', 'value' => $url],
                ['column' => 'content', 'value' => utf8_decode($content)],
                ['column' => 'tag', 'value' => $tag],
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

        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $tag = $this->validateTag(filter_input(INPUT_POST, 'tag', FILTER_DEFAULT));

        $objWBPQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objWBPQuery->populateArray([
            'column' => [
                ['column' => 'title', 'value' => utf8_decode($title)],
                ['column' => 'url', 'value' => $url],
                ['column' => 'content', 'value' => utf8_decode($content)],
                ['column' => 'tag', 'value' => $tag],
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
                ['table' => $this->sqlTable, 'column' => 'title'],
                ['table' => $this->sqlTable, 'column' => 'url'],
                ['table' => $this->sqlTable, 'column' => 'content'],
                ['table' => $this->sqlTable, 'column' => 'tag'],
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
