<?php

namespace app\controllers;

use core\classes\Controller;
use core\classes\Db;

class MainController extends Controller
{
    public function indexAction(): void
    {
        $this->view->render('Cut URL');
    }
}
