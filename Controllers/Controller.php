<?php

namespace Controllers;

use Database\Database;
use Traits\View;

abstract class Controller
{
    use View;

    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
}