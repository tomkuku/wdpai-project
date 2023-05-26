<?php

require_once 'config.php';

class Database {
    private $username;
    private $password;
    private $host;
    private $database;

    public function __construct() {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }

    public function connect() {
        try {
            $con = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password
            );

            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $con;
        } catch(PDOException $err) {
            die("Connecting into database failed with error: ".$err->getMessage());
        }
    }
}