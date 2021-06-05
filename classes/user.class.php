<?php

class User extends Db
{
    public function registerUser($username, $email, $password, $admin)
    {
        $sql = "INSERT INTO users(username, email, password, admin) VALUES (:username, :email, :password, :admin)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "admin" => $admin,
        ]);
    }

    public function getUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username=:username";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["username" => $username]);
        $user = $stmt->fetch();

        if ($user) {
            if ($user->password === $password) {
                return true;
            }
        }
        return false;
    }
}