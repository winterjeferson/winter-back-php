<?php

final class WBPConnection
{

    private static $coon = array();
    private static $instance = array();

    private function __construct()
    {
    }

    public static function open($dataBase)
    {
        getcwd();
        $localhost = 'online';
        $directory = dirname(__FILE__);

        if (strpos($directory, 'development') !== false || strpos($directory, 'homologation') !== false || strpos($directory, 'production') !== false) {
            $localhost = '';
        }

        if (!isset(self::$instance[$dataBase])) {
            self::$instance[$dataBase] = true;
            $db = array();

            if ($localhost === 'online') {
                $db['user'] = '';
                $db['pass'] = '';
                $db['name'] = '';
                $db['host'] = '';
                $db['type'] = '';
            } else {
                $db['user'] = 'root';
                $db['pass'] = '';
                $db['name'] = 'WBP';
                $db['host'] = 'localhost';
                $db['type'] = 'mysql';
            }

            $user = isset($db['user']) ? $db['user'] : NULL;
            $pass = isset($db['pass']) ? $db['pass'] : NULL;
            $name = isset($db['name']) ? $db['name'] : NULL;
            $host = isset($db['host']) ? $db['host'] : NULL;
            $type = isset($db['type']) ? $db['type'] : NULL;
            $port = isset($db['port']) ? $db['port'] : NULL;

            switch ($type) {
                case 'mdb':
                    self::$coon[$dataBase] = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)}; Dbq={$name}; Uid={$user}");
                    break;
                case 'pgsql':
                    $port = $port ? $port : '5432';
                    self::$coon[$dataBase] = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host=$host; port={$port}");
                    break;
                case 'mysql':
                    $port = $port ? $port : '3306';
                    self::$coon[$dataBase] = new PDO("mysql:host={$host}; port={$port}; dbname={$name}", $user, $pass);
                    break;
                case 'sqlite':
                    self::$coon[$dataBase] = new PDO("sqlite:{$name}");
                    break;
                case 'ibase':
                    self::$coon[$dataBase] = new PDO("firebird:dbname={$name}", $user, $pass);
                    break;
                case 'oci8':
                    self::$coon[$dataBase] = new PDO("oci:dbname={$name}", $user, $pass);
                    break;
                case 'mssql':
                    self::$coon[$dataBase] = new PDO("mssql:host={$host},1433; dbname={$name}", $user, $pass);
                    break;
            }

            self::$coon[$dataBase]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$coon[$dataBase];
    }

    public function __destruct()
    {
        self::$instance = null;
    }
}
