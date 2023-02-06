<?php

namespace core\classes;

use http\Env\Request;
use JetBrains\PhpStorm\NoReturn;

class View
{
    public string $contentPath;
    public string $layout = 'default';

    public function __construct($params)
    {
        $this->contentPath =
            $_SERVER['DOCUMENT_ROOT'] .
            '/app/views/' .
            $params['controller'] .
            '/' .
            $params['action'] .
            '.php';
    }

    public function render($title, $vars = []): void
    {
        extract($vars);
        ob_start();
        require_once $this->contentPath;
        $content = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/layouts/' . $this->layout . '.php';
    }

    public function redirect($url): void
    {
        header('Location: ' . $url);
        die();
    }

    public static function errorCode($code): void
    {
        http_response_code($code);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/errors/' . $code . '.php';
    }
}
