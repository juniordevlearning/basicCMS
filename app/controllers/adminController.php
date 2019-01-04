<?php

class adminController
{
    public function index()
    {
        View()->setBody('admin',['title' => 'This is the admin page']);
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['username'] == TRUE && $_POST['password'] == TRUE) {
                $stmt = Connection::$pdo->prepare('SELECT * FROM admins WHERE name = :user');
                $stmt->execute(['user' => $_POST['username']]);
                $user = $stmt->fetch();
                if ($user['password'] == $_POST['password']) {
                    $_SESSION['admin'] = true;
                    header("Location: /edit");
                } 
            }
        }
    }
}