<?php

namespace Kiwi;

use PDO
    , Aura\SqlQuery\QueryFactory;

/**
 * Connection Singleton
 **/
class Connection
{
    static $pdo_config = array();
    static $pdo = null;
    static $query_builder = null;

    public static function getPDO()
    {
        if(self::$pdo === null) {
            $pdo = new PDO("pgsql:host=localhost;dbname=" . self::$pdo_config['db'], self::$pdo_config['user'], self::$pdo_config['password']);
            self::$pdo = $pdo;
        }

        return self::$pdo;
    }

    public static function getQueryBuilder()
    {
        if(self::$query_builder === null) {
            $query_builder = new QueryFactory('pgsql');
            self::$query_builder = $query_builder;
        }

        return self::$query_builder;
    }
}
