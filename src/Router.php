<?php

namespace Kiwi;

use FastRoute;


class Router
{
    public static function routes()
    {
        return function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/queues', 'Kiwi\Api\Queues@queues');
            $r->addRoute('GET', '/queues/{id:\d+}', 'Kiwi\Api\Queues@queue');
        };
    }
}

