<?php

class MySingleton
{
    private static $instance = null;

    // Защищаем от создания через new
    private function __construct() {}

    // Защищаем от клонирования
    private function __clone() {}

    // Защищаем от unserialize
    private function __wakeup() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function doSomething()
    {
        return "Doing something!";
    }
}