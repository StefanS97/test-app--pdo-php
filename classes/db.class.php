<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pw = "";
    private $dbName = "project";

    public function connect()
    {
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pw);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}