<?php

use core\classes\Router;

use app\Config;


spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require_once $path;
    } else {
        die('500');
    }
});

$router = new Router;

function dd($arr): void
{
    echo '<pre>';
    var_dump($arr);
    echo '<pre>';
}
