<?php

namespace Database;

class Database
{
    public object $conn;

    public function __construct()
    {
        $dbConnection = cfg('database.db_connection');
        $dbHost = cfg('database.db_host');
        $dbName = cfg('database.db_name');

        try {
            $this->conn = new \PDO(
                "{$dbConnection}:host={$dbHost};dbname={$dbName}",
                cfg('database.db_username'),
                cfg('database.db_password')
            );

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}