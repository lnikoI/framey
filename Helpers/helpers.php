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
        $deBugTitle = '<strong style="background-color: red; padding: 5px; border-radius: 5px;">#################### <i>DEBUG</i> ####################</</strong>';

        echo $deBugTitle;
        echo '<br>';

        ob_start();
        var_dump($variable);

        $output = ob_get_clean();

        $style = "\"background-color: gray; padding: 10px;\"";

        $highlightedOutput = "<div style=$style><pre>" . highlight_string("<?php\n" . $output, true) . "</pre></div>";

        echo $highlightedOutput;

        echo '<br>';
        echo $deBugTitle;

        die();
    }
}