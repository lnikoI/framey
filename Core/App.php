<?php

namespace Core;

use Assistants\Environment;

class App
{
    public static function initialize(): void
    {
        Environment::initialize();

        Router::initialize();
    }
}