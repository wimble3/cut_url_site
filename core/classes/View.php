<?php

namespace core\classes;

use http\Env\Request;
use JetBrains\PhpStorm\NoReturn;

class View
{
    public string $contentPath;
    public string $layout = 'default';

    public function __construct(array $params)
    {
        $this->contentPath =
            $_SERVER['DOCUMENT_ROOT'] .
            '/app/views/' .
            $params['controller'] .
            '/' .
            $params['action'] .
            '.php';
    }

    public function render(string $title, array $vars = []): void
    {
        extract($vars);
        ob_start();
        require_once $this->contentPath;
        $content = ob_get_clean();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/layouts/' . $this->layout . '.php';
    }

    public static function errorCode(int $code): string
    {
        http_response_code($code);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/errors/' . $code . '.php';
        return '';
    }
}
