<?php

require_once 'AppController.php';

class DashboardController extends AppController {
   
    public function add_service_request() {
        return $this->render('add-request');
    }
} 