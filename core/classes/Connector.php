<?php

namespace core\classes;

use core\traits\TSingleton;
use app\Config;

class Connector
{
    use TSingleton;

    public \mysqli $connect;

    private function __construct()
    {
        $this->connect = new \mysqli(
            Config::HOSTNAME,
            Config::DB_USERNAME,
            Config::DB_PASSWORD,
            Config::DB_NAME
        );
        if ($this->connect->connect_error) {
            echo $this->connect->connect_error;
            exit();
        }
    }

    public function check()
    {
        dd([1, 1]);
    }
}
