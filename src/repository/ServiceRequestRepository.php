<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ServiceRequest.php';

class ServiceRequestRepository extends Repository {
    public function getServiceRequest(int $id): ?ServiceRequest {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM service_request WHERE id = :id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $request = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($request == false) {
            return null;
        }

        return new ServiceRequest(
            "Trek Slash",
            "Cos",
            "cos",
            220,
            "false",
            "01-01-2023"
        );
    }

    public function getAllServiceRequests(): array {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM service_request;
        ');
        $stmt->execute();
        $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($requests as $request) {
            $result[] = new ServiceRequest(
                $request['bike_name'],
                $request['description'],
                $request['file_name'],
                $request['price'],
                $request['is_accepted'],
                $request['date']
            );
        }

        return $result;
    }

    public function addRequest(ServiceRequest $request) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.service_request (bike_name, description, price, file_name, owner_id, is_accepted, date)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $owner_id = 3;

        $stmt->execute([
            $request->getBikeName(),
            $request->getDescription(),
            $request->getPrice(),
            $request->getImage(),
            $owner_id,
            $request->isAccepted(),
            $request->getDate()
        ]);
    }

    public function getRequestByBikeName(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM service_request WHERE LOWER(bike_name) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}