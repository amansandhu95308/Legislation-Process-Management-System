<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = json_decode(file_get_contents(STORAGE_PATH . 'users.json'), true);
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            foreach ($users as $user) {
                if ($user['username'] === $username && password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    header('Location: index.php?page=dashboard');
                    exit;
                }
            }
            echo "Invalid username or password";
        } else {
            require_once 'app/views/login.php';
        }
    }
}


