<?php



abstract class BaseAbstractController
{
    public function CaptureException(Throwable $ex)
    {
        ExceptionMiddleware::log($ex);
        ddd($ex->getTrace());
        //header('Location: /InternalError');
    }
}