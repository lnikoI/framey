<?php

namespace Companions;

use JetBrains\PhpStorm\NoReturn;

class BugyDebugy
{
    protected mixed $variable;

    #[NoReturn] public function bugy(mixed $variable): void
    {
        echo $this->title();
        echo $this->newLine(2);

        echo "File: {$this->traces()['file']}";
        echo $this->newLine();
        echo "Line: {$this->traces()['line']}";

        ob_start();
        var_dump($variable);

        $output = ob_get_clean();

        echo $this->styleHighlightedOutput($output);

        echo $this->newLine();
        echo $this->title();

        die();
    }

    protected function styleHighlightedOutput(string $output): string
    {
        $style = "\"background-color: lightgray; padding: 10px;\"";

        return "<div style=$style><pre>" . highlight_string("<?php\n" . $output, true) . "</pre></div>";
    }

    protected function traces(): array
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);

        return $trace[2];
    }

    protected function newLine(int $lines = 1): string
    {
        $newLine = '<br>';

        foreach (range(1, $lines) as $line) {
            $newLine .= $newLine;
        }

        return $newLine;
    }

    protected function title(string $title = null): string
    {
        if (! $title) {
            $title = '#################### <i>DEBUG</i> ####################';
        }

        return "<strong style=\"background-color: red; padding: 5px; margin-bottom: 5px; border-radius: 5px;\">{$title}</strong>";
    }
}
