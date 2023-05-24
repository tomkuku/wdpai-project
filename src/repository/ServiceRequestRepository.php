<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ServiceRequest.php';

class ServiceRequestRepository extends Repository {
    public function getServiceRequest(int $id): ?ServiceRequest {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM serviceRequests WHERE id = :id;
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
            "cos"
        );

//        return new User(
//            $request['email'],
//            $request['password'],
//            $request['name'],
//            $request['username']
//        );
    }

    public function addRequest(ServiceRequest $request) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.service_request (bike_name, description, price, file_name, owner_id)
            VALUES (?, ?, ?, ?, ?)
        ');

        $price = 200;
        $owner_id = 2;

        $stmt->execute([
            $request->getBikeName(),
            $request->getDescription(),
            $price,
            $request->getImage(),
            $owner_id
        ]);
    }
}