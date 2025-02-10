<?php

class AuthMiddleware
{
    public static function run()
    {
        $validate = self::validateToken();

        
    }

    public static function validateToken()
    {
        if(isset($_GET['token']) && $_GET['token'] == '1234')
        {
            // Token is valid, proceed with the request
            return true;
        }	

        return false;
    }
}