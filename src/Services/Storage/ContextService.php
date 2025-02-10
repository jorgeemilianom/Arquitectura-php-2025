<?php

final class ContextService
{
    private $data = [];
    public $header = '';

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        try {
            
            throw new Exception("Error Processing Request", 1);
            
        } catch (\Throwable $th) {
            ddd( $th->getTrace());
        }
        return isset($this->data[$key])? $this->data[$key] : null;
    }

    public static function getContext(): self
    {
        global $Context;
        return $Context;
    }


    public function setInHeader(string $value)
    {
        $this->header .= $value;
    }

}