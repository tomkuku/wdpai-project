<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController {
   
    public function login() {
        $user = new User("tk@a.pl", "123", 'tom', 'tokk');

        // if ($this->isPost()) {
        //     return $this->login('login');
        // }

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
} 