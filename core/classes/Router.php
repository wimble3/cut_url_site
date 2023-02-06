<?php

namespace core\classes;

use app\Config;

class Router
{
    protected array $urls;
    protected array $params;

    public function __construct()
    {
        $urls = require $_SERVER['DOCUMENT_ROOT'] . '/app/urls.php';

        foreach ($urls as $url => $params) {
            $this->addUrl($url, $params);
        }

        $this->route();
    }

    private function addUrl(string $url, array $params): void
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

    private function route(): void
    {
        if ($this->matchUrl()) {
            $controllerPath = 'app\controllers\\' . $this->params['controller'] . 'Controller';

            if (class_exists($controllerPath)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($controllerPath, $action)) {
                    $controller = new $controllerPath($this->params);
                    $controller->$action();
                } else {
                    echo Config::DEBUG ? '[ERROR] Action not found: ' . $action : View::errorCode(404);
                }
            }
        } else {
            echo View::errorCode(404);
        }
    }
}
