<?php

namespace Database;

class Database
{
    public object $conn;

    public function __construct()
    {
        try {
            $this->conn = $this->instantiatePDO();

        } catch (\PDOException $ex) {
            echo "Connection failed: " . $ex->getMessage();
        }
    }

    public static function query(string $query): false|array
    {
        $pdo = self::instantiatePDO();

        $statement = $pdo->query($query);

        return $statement->fetchall();
    }

    private static function instantiatePDO()
    {
        $dbConnection = cfg('database.db_connection');
        $dbHost = cfg('database.db_host');
        $dbName = cfg('database.db_name');

        try {
            return (new \PDO(
                "{$dbConnection}:host={$dbHost};dbname={$dbName}",
                cfg('database.db_username'),
                cfg('database.db_password')
            ));

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}