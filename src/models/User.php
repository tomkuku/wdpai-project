<?php

class User {
    private $surname;
    private $name;
    private $password;
    private $email;
    private $type;

    public function __construct(string $email,
                                string $password,
                                string $name,
                                string $surname,
                                int $type) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->type = $type;
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

     public function setSurname(string $surname) {
         $this->surname = $surname;
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

     public function getSurname(): string {
         return $this->surname;
    }

    public function getType(): int {
        return $this->type;
    }
}