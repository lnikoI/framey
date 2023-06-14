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

if (! function_exists('cfg')) {
    function cfg(string $cfg): string
    {
        $fileAndKey = explode('.', $cfg, 2);

        $cfgFile = require root_dir("config/{$fileAndKey[0]}.php");

        return $cfgFile[$fileAndKey[1]];
    }
}

if (! function_exists('root_dir')) {
    function root_dir(string $path = ''): string
    {
        $dirPath = dirname(__DIR__) . "/{$path}";

        return str_replace('\\', '/', $dirPath);
    }
}

if (! function_exists('view')) {
    function view(string $viewFile, array $data = null): void
    {
        $fileLocation = root_dir("Views/{$viewFile}");

        include($fileLocation);
    }
}
