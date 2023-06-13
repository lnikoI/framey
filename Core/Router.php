<?php

namespace Core;

use Controllers\WelcomeController;

class Router
{
	public $postParams = [];

	public array $getRoutes = [];

	public static function initialize()
	{
		include_once("../routes/routes.php");

		require(__DIR__ . "/../view/404.html");
		http_response_code(404);
	}

	public function get(string $uri, string|array|callable $callable): void
    {

		if($_SERVER['REQUEST_METHOD'] !== "GET") {
			return;
		}

		$urlPath = parse_url($_SERVER['REQUEST_URI'])['path'] ?? null;

		if($urlPath !== $uri) {
			return;
		}

		$this->callableCall($callable);
	}


	public function post(string $uri, string|array|callable $callable)
	{
		if($_SERVER['REQUEST_METHOD'] !== "POST") {
			return;
		}

		foreach($_POST as $key => $value){
			$this->postParams[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		}

		$urlPath = parse_url($_SERVER['REQUEST_URI'])['path'] ?? null;

		if($urlPath !== $uri) {
			return;
		}

		$this->callableCall($callable);

	}

	private function callableCall(string|array|callable $callable) {
		$this->callIfArray($callable);

		if(is_callable($callable)) {
			call_user_func($callable);
			exit();
		}

			call_user_func($callable);

			exit();
	}

	private function callIfArray(string|array|callable $callable)
	{
		if(is_array($callable)) {

			$obj = new $callable[0];

			call_user_func([$obj, $callable[1] ?? '__invoke']);

			exit();
		}
	}
}