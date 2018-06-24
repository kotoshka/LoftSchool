<?php

namespace App\Controllers;

use App\Core\View;

class Main
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

}
