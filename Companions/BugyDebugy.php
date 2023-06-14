<?php

namespace Companions;

use JetBrains\PhpStorm\NoReturn;

class BugyDebugy
{
    #[NoReturn] public function bugy(mixed $variable): void
    {
        echo $this->title();
        echo $this->newLine();

        echo $this->strongEcho('File: ') . $this->traces()['file'];
        echo $this->newLine();
        echo $this->strongEcho('Line: ') . $this->traces()['line'];

        ob_start();
        print_r($variable);

        $output = ob_get_clean();

        echo $this->styleHighlightedOutput($output);

        echo $this->title();

        die();
    }

    protected function styleHighlightedOutput(string $output): string
    {
        $style = "\"background-color: #f6f8fa; padding: 10px; border-radius: 5px; border: 1px solid #ff00ff; font-size: 14px; line-height: 1.5;\"";

        return "<pre style=$style>" . highlight_string("<?php\n" . $output, true) . "</pre>";
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

        return "<strong style=\"background-color: #ff00ff; padding: 5px; margin-bottom: 5px; border-radius: 5px;\">{$title}</strong>";
    }

    protected function strongEcho(string $text): string
    {
        return "<strong>{$text}</strong>";
    }
}
