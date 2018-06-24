<?php

namespace App\Core;

class View
{
    public function render(String $filename, array $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        require_once APPLICATION_PATH . "views/" . $filename . ".php";
    }
}
