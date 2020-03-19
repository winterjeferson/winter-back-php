<?php

/*
  //////////////////////////////////////////////////////////////////////////////// USAGE SELECT

  $objQuery = new Query();
  $objQuery->populateArray([
  'column' => [
  ['table' => 'tableName', 'column' => 'columnName'],
  ['table' => 'tableName', 'column' => 'columnName']
  ],
  'table' => [['table' => 'tableName']],
  'where' => [['table' => 'tableName', 'column' => 'columnName', 'comparison' => ' <= ', 'value' => $value]],
  'where' => [['table' => 'tableName', 'column' => 'columnName', 'comparison' => ' LIKE CONCAT("%", ', 'comparisonEnd' => ', "%")', 'value' => $value]],
  ]);
  $query = $objQuery->select();
  $queryResult = $query->fetch(PDO::FETCH_ASSOC);

  //////////////////////////////////////////////////////////////////////////////// USAGE INSERT

  $objQuery = new Query();
  $objQuery->populateArray([
  'table' => [['table' => 'tableName']]
  'column' => [
  ['column' => 'columnName', 'value' => $value],
  ['column' => 'columnName', 'value' => $value],
  ]
  ]);

  $query = $objQuery->insert();
  return $query;

  //////////////////////////////////////////////////////////////////////////////// USAGE UPDATE

  $objQuery = new Query();
  $objQuery->populateArray([
  'table' => [['table' => 'login']],
  'column' => [
  ['column' => 'active', 'value' => $value],
  ],
  'where' => [['table' => 'login', 'column' => 'id', 'value' => $id]]
  ]);

  $query = $objQuery->update();
  return $query;

  //////////////////////////////////////////////////////////////////////////////// USAGE DELETE

  $objQuery = new Query();
  $objQuery->populateArray([
  'table' => [['table' => 'tableName']],
  'where' => [['table' => 'tableName', 'column' => 'columnName', 'value' => $value]]
  ]);

  $query = $objQuery->delete();
  return $query;
 */

class WbQuery
{
    public $tablePrefix = '';
    public $array = [];
    public $sql = '';
    public $bind = true;

    public function __construct()
    {
    }

    //////////////////////////////////////////////////////////////////////////////// DELETE

    public function delete()
    {
        $this->deleteSql();

        try {
            return $this->deleteExecute();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function deleteSql()
    {
        // DELETE FROM `table`.`column` <JOIN> <USING> WHERE ? = ?
        $string = '';
        $string .= 'DELETE FROM ';
        $string .= $this->buildTable();
        $string .= $this->buildWhere();
        $string .= '';
        $this->sql = $string;
    }

    public function deleteExecute()
    {
        $objWbConnection = WbConnection::open('site');
        $query = $objWbConnection->prepare($this->sql);
        $arrayUse = $this->array['where'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {
            $query->bindParam(':' . $arrayUse[$i]['column'], $arrayUse[$i]['value'], $this->bind($arrayUse[$i]['value']));
        }

        return $query->execute();
    }

    //////////////////////////////////////////////////////////////////////////////// INSERT

    public function insert()
    {
        $this->insertSql();

        try {
            return $this->insertExecute();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function insertSql()
    {
        // INSERT INTO table (?, ?, ?) VALUES (?, ?, ?);
        $string = '';
        $string .= 'INSERT INTO ';
        $string .= $this->buildTable();
        $string .= ' (';
        $string .= $this->buildSqlColumn(false);
        $string .= ') VALUES (';
        $string .= $this->buildSqlColumn(false, true);
        $string .= ')';

        $this->sql = $string;
    }

    public function insertExecute()
    {
        $objWbConnection = WbConnection::open('site');
        $query = $objWbConnection->prepare($this->sql);
        $arrayUse = $this->array['column'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {
            $query->bindParam(':' . $arrayUse[$i]['column'], $arrayUse[$i]['value'], $this->bind($arrayUse[$i]['value']));
        }

        return $query->execute();
    }

    //////////////////////////////////////////////////////////////////////////////// SELECT

    public function select()
    {
        $this->selectSql();

        try {
            return $this->selectExecute();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function selectSql()
    {
        // SELECT ?, ? FROM <JOIN> ? <WHERE> <GROUP> <ORDER> <HAVING> <LIMIT>;  
        $string = '';

        $string .= 'SELECT ';
        $string .= $this->buildSqlColumn();
        $string .= ' FROM ';
        $string .= $this->buildTable();
        $string .= $this->buildJoin();
        $string .= $this->buildWhere();
        $string .= $this->buildOrder();
        $string .= $this->buildLimit();

        $this->sql = $string;
    }

    public function selectExecute()
    {
        $objWbConnection = WbConnection::open('site');
        $query = $objWbConnection->prepare($this->sql);

        if (isset($this->array['where'])) {
            $arrayUse = $this->array['where'];
            $length = count($arrayUse);

            for ($i = 0; $i < $length; $i++) {
                $query->bindParam(':' . $arrayUse[$i]['column'], $arrayUse[$i]['value'], $this->bind($arrayUse[$i]['value']));
            }
        }

        $query->execute();

        return $query;
    }

    //////////////////////////////////////////////////////////////////////////////// UPDATE

    public function update()
    {
        $this->updateSql();

        try {
            return $this->updateExecute();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    public function updateSql()
    {
        // UPDATE `table`.`column` SET `?` = '?', `?` = '?' WHERE `?` = '?'
        $string = '';
        $string .= 'UPDATE ';
        $string .= $this->buildTable();
        $string .= ' SET ';
        $arrayUse = $this->array['column'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {
            if (isset($arrayUse[$i]['table'])) {
                $string .= $this->tablePrefix . $arrayUse[$i]['table'];
                $string .= '.';
            }

            if ($this->bind) {
                $string .= $arrayUse[$i]['column'] . ' = :' . $arrayUse[$i]['column'];
            } else {
                $string .= $arrayUse[$i]['column'] . ' = ' . $arrayUse[$i]['value'];
            }

            if ($i < $length - 1) {
                $string .= ', ';
            }
        }

        $string .= $this->buildWhere();
        $this->sql = $string;
    }


    public function updateExecute()
    {
        $objWbConnection = WbConnection::open('site');
        $query = $objWbConnection->prepare($this->sql);
        $arrayUseColumn = $this->array['column'];
        $lengthColumn = count($arrayUseColumn);
        $arrayUseWhere = $this->array['where'];
        $lengthWhere = count($arrayUseWhere);

        if ($this->bind) {
            for ($i = 0; $i < $lengthColumn; $i++) {
                $query->bindParam(':' . $arrayUseColumn[$i]['column'], $arrayUseColumn[$i]['value'], $this->bind($arrayUseColumn[$i]['value']));
            }
        }

        for ($i = 0; $i < $lengthWhere; $i++) {
            $query->bindParam(':' . $arrayUseWhere[$i]['column'], $arrayUseWhere[$i]['value'], $this->bind($arrayUseWhere[$i]['value']));
        }

        return $query->execute();
    }

    //////////////////////////////////////////////////////////////////////////////// BIND

    public function bind($paramenter, $kind = '')
    {
        $newKind = '';

        if ($kind === '') {
            if (is_int($paramenter)) {
                $newKind = 'int';
            } else if (is_bool($paramenter)) {
                $newKind = 'bool';
            } else if (is_null($paramenter)) {
                $newKind = 'null';
            } else if (is_string($paramenter)) {
                $newKind = 'string';
            }
        } else {
            $newKind = $kind;
        }

        switch ($newKind) {
            case 'int':
                return PDO::PARAM_INT;
            case 'bool':
                return PDO::PARAM_BOOL;
            case 'null':
                return PDO::PARAM_NULL;
            case 'string':
                return PDO::PARAM_STR;
        }
    }

    //////////////////////////////////////////////////////////////////////////////// CLAUSURE

    public function buildSqlColumn($table = true, $isValue = false)
    {
        $string = '';
        $arrayUse = $this->array['column'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {

            if (isset($arrayUse[$i]['table']) !== '' && $table === true) {
                $string .= '`' . $this->tablePrefix . $arrayUse[$i]['table'] . '`';
                $string .= '.';
            }

            if ($isValue) {
                $string .= ':';
            }

            $string .= $arrayUse[$i]['column'];

            if ($i < $length - 1) {
                $string .= ', ';
            }
        }

        return $string;
    }

    public function buildJoin()
    {
        if (!isset($this->array['join'])) {
            return false;
        }

        $string = '';
        $arrayUse = $this->array['join'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {
            $string .= ' ' . $arrayUse[$i]['kind'] . ' ';
            $string .= $this->tablePrefix . $arrayUse[$i]['table'];
            $string .= ' ON ';
            $string .= $this->tablePrefix . $arrayUse[$i]['column1']['table'];
            $string .= '.';
            $string .= $arrayUse[$i]['column1']['column'];
            $string .= ' = ';
            $string .= $this->tablePrefix . $arrayUse[$i]['column2']['table'];
            $string .= '.';
            $string .= $arrayUse[$i]['column2']['column'];
        }

        return $string;
    }

    public function buildLimit()
    {
        if (!isset($this->array['limit'])) {
            return false;
        }

        $string = '';
        $arrayUse = $this->array['limit'];
        $length = count($arrayUse);
        $string .= ' LIMIT ';

        for ($i = 0; $i < $length; $i++) {
            if (isset($arrayUse[$i]['initial'])) {
                $string .= $arrayUse[$i]['initial'];
                $string .= ', ';
            }

            $string .= $arrayUse[$i]['final'];
        }

        return $string;
    }

    public function buildOrder()
    {
        if (!isset($this->array['order'])) {
            return false;
        }

        $string = '';
        $arrayUse = $this->array['order'];
        $length = count($arrayUse);
        $string .= ' ORDER BY ';

        for ($i = 0; $i < $length; $i++) {
            $string .= $arrayUse[$i]['column'];
            $string .= ' ' . $arrayUse[$i]['order'];

            if ($i < $length - 1) {
                $string .= ', ';
            }
        }

        return $string;
    }

    public function buildTable()
    {
        if (!isset($this->array['table'])) {
            return false;
        }

        $string = '';
        $arrayUse = $this->array['table'];
        $length = count($arrayUse);

        for ($i = 0; $i < $length; $i++) {
            $string .= $this->tablePrefix . $arrayUse[$i]['table'];

            if ($i < $length - 1) {
                $string .= ', ';
            }
        }

        return $string;
    }

    public function buildWhere()
    {
        if (!isset($this->array['where'])) {
            return false;
        }

        $string = '';
        $arrayUse = $this->array['where'];
        $length = count($arrayUse);

        $string .= ' WHERE ';

        for ($i = 0; $i < $length; $i++) {
            $string .= $this->tablePrefix . $arrayUse[$i]['table'];
            $string .= '.';
            $string .= $arrayUse[$i]['column'];

            if (isset($arrayUse[$i]['comparison'])) {
                $string .= $arrayUse[$i]['comparison'];
            } else {
                $string .= ' = ';
            }

            $string .= ':' . $arrayUse[$i]['column'];

            if (isset($arrayUse[$i]['comparisonEnd'])) {
                $string .= $arrayUse[$i]['comparisonEnd'];
            }

            if ($i < $length - 1) {
                $string .= ' AND ';
            }
        }

        return $string;
    }

    //////////////////////////////////////////////////////////////////////////////// OTHER

    public function populateArray($array)
    {
        foreach ($array as $key => $value) {
            $this->array[$key] = $value;
        }
    }

    public function returnJson($array)
    {
        $arr = [];

        foreach ($array as $key => $value) {
            $arr[$key] = is_string($value) ? utf8_encode($value) : $value;
        }

        return json_encode($arr);
    }

    public function unbind()
    {
        $this->bind = false;
    }
}
