<?php

class ServiceRequest {
    private $bikeName;
    private $description;
    private $image;

    public function __construct(string $bikeName, string $description, string $image) {
        $this->bikeName = $bikeName;
        $this->description = $description;
        $this->image = $image;
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
}