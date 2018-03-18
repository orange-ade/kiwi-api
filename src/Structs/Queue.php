<?php

namespace Kiwi\Structs;

use PDO
  , Kiwi\Connection;

class Queue
{
    static $table = 'queues';

    public static function all()
    {
        $pdo = Connection::getPdo();
        $builder = Connection::getQueryBuilder();

        $select = $builder->newSelect();

        $select->cols([
            'id',
            'name'
        ]);

        $select->from(Queue::$table);

        $sth = $pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
}
