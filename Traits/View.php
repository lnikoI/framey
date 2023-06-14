<?php

namespace Traits;

trait View
{
    protected string $viewDir = "view";

    public function view(string $viewFile, array $data = null): void
    {
        $fileLocation = __DIR__ . "/../{$this->viewDir}/{$viewFile}";

        require_once($fileLocation);
    }

    public function setViewDir(string $viewDir): void
    {
        $this->viewDir = $viewDir;
    }

    public function getViewDir()
    {
        return $this->viewDir;
    }
}