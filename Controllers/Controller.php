<?php

namespace Controllers;

use Database\Database;

abstract class Controller
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
}