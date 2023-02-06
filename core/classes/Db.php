<?php

namespace core\classes;

use core\traits\TSingleton;
use app\Config;

class Db
{
    use TSingleton;

    public \mysqli|null $connect;

    private function __construct()
    {
        $this->connect = new \mysqli(
            Config::HOSTNAME,
            Config::DB_USERNAME,
            Config::DB_PASSWORD,
            Config::DB_NAME
        );
    }
}
