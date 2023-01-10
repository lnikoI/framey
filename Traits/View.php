<?php

namespace Traits;

Trait View
{
	protected $viewDir = "view";

	public function view(string $viewFile, array $data = null)
	{
		$fileLocation = __DIR__ . "/../{$this->viewDir}/{$viewFile}";

		require_once($fileLocation);
	}

	public function setViewDir(string $viewDir)
	{
		$this->viewDir = $viewDir;
	}

	public function getViewDir()
	{
		return $this->viewDir;
	}
}