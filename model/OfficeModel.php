<?php

class OfficeModel {
    private $name;
    private $address;
    private $city;
    private $phone;

    public function __construct(string $name = "", string $address = "", string $city = "", string $phone = "") {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->phone = $phone;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress(string $address) {
        $this->address = $address;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity(string $city) {
        $this->city = $city;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }
    public function getAllOffices() {
        return $_SESSION['office_list'];
    }
} 