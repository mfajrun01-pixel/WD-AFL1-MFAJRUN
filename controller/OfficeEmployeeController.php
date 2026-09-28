<?php
require_once("../model/EmployeeModel.php");
require_once("../model/OfficeModel.php");
require_once("../model/OfficeEmployeeModel.php");

class OfficeEmployeeController {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_save_path(sys_get_temp_dir());
            session_start();
        }
        if (!isset($_SESSION['office_employee_list'])) {
            $_SESSION['office_employee_list'] = array();
        }
    }

    public function createOfficeEmployee(EmployeeModel $employee, OfficeModel $office) {
        $officeEmployee = new OfficeEmployeeModel($employee, $office);
        array_push($_SESSION['office_employee_list'], $officeEmployee);
    }

    public function getAllOfficeEmployees() {
        return $_SESSION['office_employee_list'];
    }

    public function deleteOfficeEmployee($index) {
        if (isset($_SESSION['office_employee_list'][$index])) {
            unset($_SESSION['office_employee_list'][$index]);
            $_SESSION['office_employee_list'] = array_values($_SESSION['office_employee_list']);
        }
    }
}

$controller_office_employee = new OfficeEmployeeController();
if (isset($_POST['button_add_office_employee'])) {
    $employeeIndex = $_POST['selectEmployee'];
    $officeIndex = $_POST['selectOffice'];

    $employeeList = (new EmployeeModel())->getAllEmployees();
    $officeList = (new OfficeModel())->getAllOffices();

    if (isset($employeeList[$employeeIndex]) && isset($officeList[$officeIndex])) {
        $controller_office_employee->createOfficeEmployee($employeeList[$employeeIndex], $officeList[$officeIndex]);
    }

    header("Location: ../view/office_employee_view.php");
    exit();
}
if (isset($_GET['delete_office_employee_index'])) {
    $controller_office_employee->deleteOfficeEmployee($_GET['delete_office_employee_index']);
    header("Location: ../view/office_employee_view.php");
    exit();
}