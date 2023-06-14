<?php

namespace Database;

class Database
{
    public object $conn;

    public function __construct()
    {
        $dbConnection = env('DB_CONNECTION');
        $dbHost = env('DB_HOST');
        $dbName = env('DB_DATABASE');

        try {
            $this->conn = new \PDO(
                "{$dbConnection}:host={$dbHost};dbname={$dbName}",
                env('DB_USERNAME'),
                env('DB_PASSWORD')
            );

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}