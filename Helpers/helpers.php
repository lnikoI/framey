<?php

if (! function_exists('env')) {
    function env(string $key): mixed
    {
        return getenv($key);
    }
}
