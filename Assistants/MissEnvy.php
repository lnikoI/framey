<?php

namespace Assistants;

class MissEnvy
{
    /**
     * @throws \RuntimeException
     */
    public static function initialize(): void
    {
        $envPath = root_dir('/.env');

        if (! file_exists($envPath)) {
            throw new \RuntimeException("File not found: {$envPath}");
        }

        if (! is_readable($envPath)) {
            throw new \RuntimeException("File is not readable: {$envPath}");
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        self::appendEnvKayValues($lines);
    }

    private static function appendEnvKayValues(array $lines): void
    {
        foreach ($lines as $line) {

            $isCommentedLine = str_starts_with($line, '#');

            if ($isCommentedLine) {
                continue;
            }

            $lineKeyValue = explode('=', str_replace(' ', '', $line), 2);

            $key = $lineKeyValue[0];

            $value = $lineKeyValue[1];

            if (! array_key_exists($key, $_ENV)) {
                putenv(sprintf('%s=%s', $key, $value));
                $_ENV[$key] = $value;
            }
        }
    }
}