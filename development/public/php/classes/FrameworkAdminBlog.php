<?php

class FrameworkAdminBlog {

    private $sqlTable = 'blog';

    public function __construct() {
        
    }

    function buildReport($status) {
        $active = $status === 'active' ? 1 : 0;
        $string = '';
        $objFrameworkQuery = new FrameworkQuery();

        $this->buildReportSql($objFrameworkQuery);

        $objFrameworkQuery->populateArray([
            'where' => [
                ['table' => $this->sqlTable, 'column' => 'active', 'value' => $active]
            ]
        ]);

        $query = $objFrameworkQuery->select();
        $queryResult = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($queryResult as $key => $value) {
            $string .= $this->buildReportHTML($value, $status);
        }

        return $string;
    }

    function buildReportSql($objFrameworkQuery) {
        $objFrameworkQuery->populateArray([
            'column' => [
                ['table' => $this->sqlTable, 'column' => '*']
            ],
            'table' => [['table' => $this->sqlTable]],
            'order' => [
                ['column' => 'id', 'order' => 'DESC']
            ],
        ]);
    }

    function buildReportHTML($value, $status) {
        $objThemeLayout = new ThemeLayout();

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
        $string .= $objThemeLayout->buildHTMLBt('edit', $value['id']);
        $string .= '                </li>';

        $string .= '                <li>';
        $string .= $objThemeLayout->buildHTMLBt($status, $value['id']);
        $string .= '                </li>';

        $string .= '                <li>';
        $string .= $objThemeLayout->buildHTMLBt('delete', $value['id']);
        $string .= '                </li>';

        $string .= '            </ul>';
        $string .= '        </nav>';
        $string .= '    </td>';
        $string .= '</tr>';

        return $string;
    }

    function doUpdate() {
        $objFrameworkQuery = new FrameworkQuery();

        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $tag = filter_input(INPUT_POST, 'tag', FILTER_DEFAULT);
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);

        $objFrameworkQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objFrameworkQuery->populateArray([
            'column' => [
                ['column' => 'title', 'value' => utf8_decode($title)],
                ['column' => 'url', 'value' => $url],
                ['column' => 'content', 'value' => utf8_decode($content)],
                ['column' => 'tag', 'value' => $tag],
                ['column' => 'active', 'value' => 1],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objFrameworkQuery->update();
        return $query;
    }

    function doRegister() {
        $objFrameworkQuery = new FrameworkQuery();

        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $url = filter_input(INPUT_POST, 'url', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $tag = filter_input(INPUT_POST, 'tag', FILTER_DEFAULT);

        $objFrameworkQuery->populateArray([
            'table' => [['table' => $this->sqlTable]]
        ]);

        $objFrameworkQuery->populateArray([
            'column' => [
                ['column' => 'title', 'value' => utf8_decode($title)],
                ['column' => 'url', 'value' => $url],
                ['column' => 'content', 'value' => utf8_decode($content)],
                ['column' => 'tag', 'value' => $tag],
                ['column' => 'active', 'value' => 1],
            ]
        ]);

        $query = $objFrameworkQuery->insert();
        return $query;
    }

    function doModify() {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $status = filter_input(INPUT_POST, 's', FILTER_DEFAULT);
        $value = $status === 'inactivate' ? 0 : 1;

        $objFrameworkQuery = new FrameworkQuery();
        $objFrameworkQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'column' => [
                ['column' => 'active', 'value' => $value],
            ],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objFrameworkQuery->update();

        return $query;
    }

    function doDelete() {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        $objFrameworkQuery = new FrameworkQuery();
        $objFrameworkQuery->populateArray([
            'table' => [['table' => $this->sqlTable]],
            'where' => [['table' => $this->sqlTable, 'column' => 'id', 'value' => $id]]
        ]);

        $query = $objFrameworkQuery->delete();
        return $query;
    }

    function editLoadData() {
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $objFrameworkQuery = new FrameworkQuery();
        $objFrameworkQuery->populateArray([
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

        $query = $objFrameworkQuery->select();
        $queryResult = $query->fetch(PDO::FETCH_ASSOC);

        return $objFrameworkQuery->returnJson($queryResult);
    }

}
