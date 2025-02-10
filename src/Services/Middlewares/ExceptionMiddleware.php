<?php

class ExceptionMiddleware
{
    static function log(Throwable $exception)
    {
        // Guarde en un archivo, los logs de excptions
        // $exception->getMessage()
    }
}