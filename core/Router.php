<?php

namespace core;

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/w3.php';

class Router
{
    protected array $urls;
    protected array $params;

    public function __construct()
    {
        $urls = require $_SERVER['DOCUMENT_ROOT'] . '/urls.php';

        foreach ($urls as $url => $params) {
            $this->addUrl($url, $params);
        }

        $this->route();
    }

    private function addUrl($url, $params): void
    {
        $url = '#^' . $url . '$#';
        $this->urls[$url] = $params;
    }

    private function matchUrl(): bool
    {
        $request_uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->urls as $url => $params) {
            if (preg_match($url, $request_uri, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    private function route()
    {
        if ($this->matchUrl()) {
            $controller = 'app\controllers\\' . $this->params['controller'] . 'Controller.php';
        }

        dd($controller);
    }
}
