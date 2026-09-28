<?php

class EmployeeModel {
    private $nama;
    private $jabatan;
    private $umur;

    public function __construct(string $nama = "", string $jabatan = "", int $umur = 0) {
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->umur = $umur;
    }

    public function getName() {
        return $this->nama;
    }
    public function setName(string $nama) {
        $this->nama = $nama;
    }
    public function getJabatan() {
        return $this->jabatan;
    }
    public function setJabatan(string $jabatan) {
        $this->jabatan = $jabatan;
    }
    public function getUmur() {
        return $this->umur;
    }
    public function setUmur(int $umur) {
        $this->umur = $umur;
    }
    public function getAllEmployees() {
        return $_SESSION['employee_list'];
    }
}

