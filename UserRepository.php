<?php
class UserRepository {
    private $filePath;

    public function __construct() {
        $this->filePath = STORAGE_PATH . 'users.json';
    }

    public function getAllUsers() {
        return json_decode(file_get_contents($this->filePath), true) ?? [];
    }

    public function findUserByUsername($username) {
        $users = $this->getAllUsers();
        foreach ($users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }

    public function saveUser($user) {
        $users = $this->getAllUsers();
        $users[] = $user;
        file_put_contents($this->filePath, json_encode($users));
    }
}
