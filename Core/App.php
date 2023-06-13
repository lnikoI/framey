<?php

namespace Core;

use Helpers\Environment;

class App
{
    public static function initialize(): void
    {
        Environment::initialize();

        Router::initialize();
    }
}