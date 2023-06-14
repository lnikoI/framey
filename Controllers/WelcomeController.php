<?php

namespace Controllers;

class WelcomeController extends Controller
{
    public function home()
    {
        $stmt = $this->db->conn->query("SELECT * FROM users");

        $users = $stmt->fetchall();

        deb($users);
    }

    public function index()
    {
        $stmt = $this->db->conn->query("SELECT * FROM users");

        $users = $stmt->fetchall();

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