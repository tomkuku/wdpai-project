<?php

require_once 'AppController.php';

class RequestController extends AppController {
   
    public function addrequest() {
        $this->render('add-request');
    }
} 