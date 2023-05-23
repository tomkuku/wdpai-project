<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {
   
    public function login() {
        $user = new User("tk@a.pl", "123", 'tom', 'tokk');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        if (isset($_POST["create-account"])) {
            return $this->render('create-account');
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

    public function createAccount() {
        if (!$this->isPost()) {
            return $this->render('create-account');
        }

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];

        $password1 = $_POST["psw"];
        $password2 = $_POST["psw-repeat"];

        if ($password1 !== $password2) {
            return $this->render('create-account', ['messages' => ["Passwords are not equal!"]]);
        }

        $this->render('create-account', ['messages' => ["Account created!"]]);

        // TODO: Connect Database
    }
} 