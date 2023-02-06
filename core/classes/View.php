<?php

namespace core\classes;

class View
{
    public string $contentPath;
    public string $layout = 'default';

    public function __construct($params)
    {
        $this->contentPath = $_SERVER['DOCUMENT_ROOT'] . '/app/views/' . $params['action'] . '.php';
    }

    public function render($title, $content = []): void
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/layouts/' . $this->layout . '.php';
    }
}
