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
    static $pdo = NULL;
    static $query_builder = NULL;

    public static function getPDO()
    {
        if(self::$pdo === NULL) {
            $pdo = new PDO("pgsql:host=localhost;dbname=" . self::$pdo_config['db'], self::$pdo_config['user'], self::$pdo_config['password']);
        }

        return self::$pdo = $pdo;
    }

    public static function getQueryBuilder()
    {
        if(self::$query_builder === NULL) {
            $query_builder = new QueryFactory('pgsql');
        }

        return self::$query_builder = $query_builder;
    }
}
