<?php

namespace core\classes;

abstract class Controller
{
    public array $params;
    public View $view;

    public function __construct($params)
    {
        $this->params = $params;
        $this->view = new View($this->params);
    }
}
