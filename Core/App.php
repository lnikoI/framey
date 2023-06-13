<?php

namespace Core;

use Helpers\Env;

class App
{
	public static function initialize(): void
    {
        Env::initialize();

        Router::initialize();
	}
}