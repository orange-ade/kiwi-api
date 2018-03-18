<?php

namespace Kiwi;

use FastRoute;
use Kiwi\Router;

class Application
{
    public static function run($request)
    {
        $dispatcher = FastRoute\simpleDispatcher(Router::routes());

        $httpMethod = $request['REQUEST_METHOD'];
        $uri = $request['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            // ... 404 Not Found
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            // ... 405 Method Not Allowed
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];

            // call the route
            $f_handler = explode('@', $handler);
            $f_class = new $f_handler[0];
            $method = $f_handler[1];
            Response::print($f_class->$method($vars));
            break;
        }
    }
}
