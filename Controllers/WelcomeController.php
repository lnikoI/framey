<?php

namespace Controllers;

use Database\Database;
use Traits\View;

class WelcomeController
{
    use View;

    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function index(): void
    {
        $stmt = $this->db->conn->query("SELECT * FROM users");

        $users = $stmt->fetchall();

        $this->view('welcome.php', ['users' => $users]);
    }

    public function show(): void
    {
        $this->view('show.php');
    }

    public function createUser()
    {
        $inserts = [
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
        ];

        $sql = "INSERT INTO users(name, email, password) VALUES (?,?,?)";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute($inserts);

        header("Location: http://localhost:8000/index");
    }
}