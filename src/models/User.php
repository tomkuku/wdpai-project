<?php

class User {
    private $username;
    private $name;
    private $password;
    private $email;

    public function __construct(string $email, string $password, string $name, string $username) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->username = $username;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getUsername(): string {
        return $this->username;
    }
}