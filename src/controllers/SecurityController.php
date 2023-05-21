<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

        if (!$this->isPost()) {
            return $this->render('login');
        }

        if (isset($_POST["sign-up-button"])) {
            return $this->render('sign-up');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

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

        if ($name != null || $surname != null || $email != null) {
            return $this->render('sign-up', ['messages' => ["Enter all values!"]]);
        }

        if ($password1 !== $password2) {
            return $this->render('sign-up', ['messages' => ["Passwords are not equal!"]]);
        }

        $this->render('sign-up', ['messages' => ["Account created!"]]);

        // TODO: Connect Database
    }
} 