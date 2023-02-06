<?php

namespace core\traits;

trait TSingleton
{
    private static self $instance;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __wakeup()
    {
    }

    private function __clone()
    {
    }
}
