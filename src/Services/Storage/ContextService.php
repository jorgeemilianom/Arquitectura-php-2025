<?php

final class ContextService
{
    private $data = [];

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        return isset($this->data[$key])? $this->data[$key] : null;
    }

    public static function getContext(): self
    {
        global $Context;
        return $Context;
    }
}