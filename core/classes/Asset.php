<?php

namespace core\classes;

use app\Config;
use core\traits\TSingleton;

class Asset
{
    use TSingleton;

    private array $css;
    private array $js;

    public function getCss(): void
    {
        if (!empty($this->css)) {
            foreach ($this->css as $path) {
                echo '<link rel="stylesheet" href="' .
                    '../../../' .
                    Config::ASSET_PATH .
                    $path .
                    '"' .
                    ">\n";
            }
        }
    }

    public function addCss(string $cssPath): void
    {
        $this->css[] = $cssPath;
    }

    public function getJs(): void
    {
        if (!empty($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' .
                    '../../../' .
                    Config::ASSET_PATH .
                    $js .
                    '"></script>' .
                    "\n";
            }
        }
    }

    public function addJs(string $jsPath): void
    {
        $this->js[] = $jsPath;
    }

    public function getMeta(): void
    {
        echo '<meta charset="' . Config::ENCODING . '">' . "\n";
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
    }

    public function getJquery(): void
    {
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>' . "\n";
    }

    public function clear(): void
    {
        $this->css = [];
        $this->js = [];
    }
}