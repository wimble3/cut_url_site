<?php
spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
        require_once $path;
    } else {
        die('Autoload error');
    }
});

$router = new \core\Router;

function dd($arr): void
{
    echo '<pre>';
    var_dump($arr);
    echo '<pre>';
}
