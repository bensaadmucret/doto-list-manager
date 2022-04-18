<?php

declare(strict_types=1);

namespace App\Controller;

use Core\Controller\BaseController;

class HomeController extends BaseController
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('home/index', [

        ], 'default');
    }

    public function show()
    {
        $this->render('home/show', [

        ], 'default');
    }

    public function add()
    {
        $this->render('home/add', [

        ], 'default');
    }
}
