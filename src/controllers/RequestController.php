<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/ServiceRequest.php';
require_once __DIR__.'/../repository/ServiceRequestRepository.php';

class RequestController extends AppController {
   
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $serviceRequestRepository;

    public function __construct() {
        parent::__construct();
        session_start();
        $this->serviceRequestRepository = new ServiceRequestRepository();
    }

    public function addRequest() {
        if (isset($_POST["cancel-button"])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/serviceRequests");
            return;
        }

        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->isFileValid($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $date = date('Y-m-d H:i:s');

            $serviceRequest = new ServiceRequest(
                $_POST['bikename'],
                $_POST['description'],
                $_FILES['file']['name'],
                $_POST['price'],
                "false",
                $date
            );

            $this->serviceRequestRepository->addRequest($serviceRequest);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/serviceRequests");
            return;
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

    public function serviceRequests() {
        $requests = $this->serviceRequestRepository->getAllServiceRequests();
        $this->render('requests', ['serviceRequests' => $requests]);
    }

    public function search() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            http_response_code(200);

            echo json_encode($this->serviceRequestRepository->getRequestByBikeName($decoded['search']));
        }
    }

    public function acceptRequest(string $id) {
        $id = intval($id);

        $this->serviceRequestRepository->acceptRequest($id);
        http_response_code(200);
    }
} 