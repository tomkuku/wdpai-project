<?php

class ServiceRequest {
    private $bikeName;
    private $description;
    private $image;
    private $price;
    private $isAccepted;
    private $date;
    private $id;

    public function __construct(string $bikeName,
                                string $description,
                                string $image,
                                int $price,
                                string $isAccepted = 'false',
                                string $date,
                                int $id = null) {
        $this->bikeName = $bikeName;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->isAccepted = $isAccepted;
        $this->date = $date;
        $this->id = $id;
    }

    public function setBikeName(string $bikeName) {
        $this->bikeName = $bikeName;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function getBikeName(): string {
        return $this->bikeName;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function isAccepted(): string {
        return $this->isAccepted;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function getId() {
        return $this->id;
    }
}



























