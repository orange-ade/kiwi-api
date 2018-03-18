<?php

namespace Kiwi;

class Response
{
    public static function json($object)
    {
        return json_encode($object);
    }

    public static function print($element)
    {
        header('Content-Type: application/json');
        echo $element;
    }
}
