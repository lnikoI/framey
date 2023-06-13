<?php

namespace Config;

class database
{
	protected string $servername = "localhost";
	protected string $username = "root";
	protected string $password = "";
	protected string $dbname = "php_framework";

	public $conn = null;

	public function __construct()
	{
		try {
			$this->conn = new \PDO(
				"mysql:host={$this->servername};dbname={$this->dbname}",
				$this->username,
				$this->password
			);

		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
}