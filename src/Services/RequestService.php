<?php


class RequestService
{

    public static function route(string $path, $callback)
    {
        if (self::getRoute($_SERVER['REQUEST_URI']) == $path) {
            $callback();
            die;
        }
    }
    
    public static function getRoute(string $route): string
    {
        $route = explode('?', $route);
        return $route[0];
    }
}