<?php

namespace Controllers;

use Database\Database;

class WelcomeController extends Controller
{
    public function home()
    {
        $users = Database::query("SELECT * FROM users");

        deb($users);
    }

    public function index()
    {
        $users = Database::query("SELECT * FROM users");

        view('welcome.php', ['users' => $users]);
    }

    public function show()
    {
        view('show.php');
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

        header('Location: ' . cfg('app.url') . '/index');
    }
}