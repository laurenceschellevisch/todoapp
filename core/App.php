<?php

class App
{
    /**
     * All registered keys.
     *
     * @var array
     */
    protected static $registry = [];


    /**
     * Bind a new key/value into the container.
     *
     * @param  string $key
     * @param  mixed  $value
     */
    public static function bind($key, $value)
        //binds key value in container registry
    {
        static::$registry[$key] = $value;
    }

    /**
     * Retrieve a value from the registry.
     *
     * @param  string $key
     */
    public static function get($key)
        //gets container by key
    {
        if (! array_key_exists($key, static::$registry)) {
            throw new Exception("No {$key} is bound in the container.");
        }

        return static::$registry[$key];
    }
}
