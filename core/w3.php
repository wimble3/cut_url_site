<?php

use core\classes\Router;
use app\Config;
use core\classes\View;


spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require_once $path;
    } else {
        echo Config::DEBUG ? '[ERROR] This controller not found' : View::errorCode(404);
    }
});

$router = new Router;

function dd($arr): void
{
    echo '<pre>';
    var_dump($arr);
    echo '<pre>';
}
