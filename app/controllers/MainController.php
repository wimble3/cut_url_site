<?php

namespace app\controllers;

use core\classes\Controller;

class MainController extends Controller
{
    public function indexAction(): void
    {
        $this->view->render('Cut URL');
    }
}
