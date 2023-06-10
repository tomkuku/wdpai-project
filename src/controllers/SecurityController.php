<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct() {
        parent::__construct();

        $this->userRepository = new UserRepository();
    }

    public function login() {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        if (isset($_POST["sign-up-button"])) {
            return $this->render('sign-up');
        }

        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $user = $this->userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if (trim($user->getEmail()) !== trim($email)) {
            return $this->render('login', ["messages" => ["Invalid email"]]);
        }

        if ($user->getPassword() != $password) {
            return $this->render('login', ["messages" => ["Invalid password"]]);
        }

        $_SESSION['user-type'] = $user->getType();
        $_SESSION['user-id'] = $this->userRepository->getUserId($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/serviceRequests");
    }

    public function signUp() {
        if (!$this->isPost()) {
            return $this->render('sign-up');
        }
        
        if (isset($_POST["cancel-button"])) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password1 = md5($_POST["psw"]);
        $password2 = md5($_POST["psw-repeat"]);

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $userType = (int)$_POST["user-type"];

        $user = $this->userRepository->getUser($email);

        if ($user) {
            return $this->render('sign-up', ['messages' => ['User with this email address already exists!']]);
        }

        if ($password1 !== $password2) {
            return $this->render('sign-up', ['messages' => ["Passwords are not equal!"]]);
        }

        $user = new User(
            $email,
            $password1,
            $name,
            $surname,
            $userType
        );

        $this->userRepository->addUser($user);

        $this->render('login', ["messages" => ["Account created!"]]);
    }
} 