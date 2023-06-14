<?php

use Companions\BugyDebugy;
use JetBrains\PhpStorm\NoReturn;

if (! function_exists('env')) {
    function env(string $key): mixed
    {
        return getenv($key);
    }
}

if (! function_exists('deb')) {
    #[NoReturn] function deb(mixed $variable): void
    {
        $bugyDebugy = new BugyDebugy();

        $bugyDebugy->bugy($variable);
    }
}