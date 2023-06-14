<?php

use JetBrains\PhpStorm\NoReturn;

if (! function_exists('env')) {
    function env(string $key): mixed
    {
        return getenv($key);
    }
}

if (! function_exists('deb')) {
    #[NoReturn] function deb(mixed $variable): mixed
    {
        $bugyDebugy = new \Companions\BugyDebugy();

        $bugyDebugy->bugy($variable);
    }
}