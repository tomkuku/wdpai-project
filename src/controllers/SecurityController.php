<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {
   
    public function login() {
        $user = new User("tk@a.pl", "123", 'tom', 'tokk');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        if (isset($_POST["sign-up-button"])) {
            return $this->render('sign-up');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if (trim($user->getEmail()) !== trim($email)) {
            return $this->render('login', ["messages" => ["Invalid email"]]);
        }

        if ($user->getPassword() != $password) {
            return $this->render('login', ["messages" => ["Invalid password"]]);
        }

        return $this->render('dashboard');
    }

    public function signUp() {
        if (!$this->isPost()) {
            return $this->render('sign-up');
        }
        
        if (isset($_POST["cancel-button"])) {
            return $this->render('login');
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];

        $password1 = $_POST["psw"];
        $password2 = $_POST["psw-repeat"];

        if ($password1 !== $password2) {
            return $this->render('sign-up', ['messages' => ["Passwords are not equal!"]]);
        }

        $this->render('sign-up', ['messages' => ["Account created!"]]);

        // TODO: Connect Database
    }
} 