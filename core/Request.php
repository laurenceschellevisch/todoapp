<?php

class Request
{
    public static function uri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            //gives back uri without unnessasary / infront or in the back
            return trim(
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
            );
        }
        //ofc when no uri just return empty
        return '';

    }

    public static function method()
    {
        //gets method if its post or get
        return $_SERVER['REQUEST_METHOD'];
    }
}