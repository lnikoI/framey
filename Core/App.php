<?php

namespace Core;

use Assistants\MissEnvy;

class App
{
    public static function initialize(): void
    {
        MissEnvy::initialize();

        Router::initialize();
    }
}