<?php
class OfficeEmployeeModel {
    private $employee;
    private $office;

    public function __construct($employee, $office) {
        $this->employee = $employee;
        $this->office = $office;
    }

    public function getEmployee() {
        return $this->employee;
    }

    public function getOffice() {
        return $this->office;
    }
    public function setEmployee($employee) {
        $this->employee = $employee;
    }
    public function setOffice($office) {
        $this->office = $office;
    }
}
?>