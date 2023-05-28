<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH); 

Routing::get('index', 'DefaultController');
Routing::get('serviceRequests', 'RequestController');
Routing::post('login', 'SecurityController');
Routing::post('addRequest', 'RequestController');
Routing::post('signUp', 'SecurityController');
Routing::post('search', 'RequestController');
Routing::post('requests', 'RequestController');

Routing::run($path);