<?php

require_once 'AppController.php';

class RequestController extends AppController {
   
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];

    public function addRequest() {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->isFileValid($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            return $this->render('dashboard', ['messsages' => $this->messages]);
        }

        $this->render('add-request', ['messsages' => $this->messages]);
    }

    private function isFileValid(array $file): bool {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
} 