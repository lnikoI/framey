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
        echo '<strong>########## DEBUG ##########</strong>';
        echo '<br><br>';

        var_dump($variable);

        echo '<br><br>';
        echo '<strong>########## DEBUG ##########</strong>';
        die();
    }
}