<?php
require_once("../model/EmployeeModel.php");

class EmployeeController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
             session_save_path(sys_get_temp_dir());
             session_start();
        }
        if (!isset($_SESSION['employee_list'])) {
            $_SESSION['employee_list'] = array();
        }
    }
    public function createEmployee() {
        $nama = $_POST['inputNama'];
        $jabatan = $_POST['inputJabatan'];
        $umur = $_POST['inputUmur'];

        $employee = new EmployeeModel($nama, $jabatan, $umur);
        array_push($_SESSION['employee_list'], $employee);
    }
    public function getAllEmployees() {
        return $_SESSION['employee_list'];
    }
    public function deleteEmployee($index) {
        if (isset($_SESSION['employee_list'][$index])) {
            unset($_SESSION['employee_list'][$index]);
            $_SESSION['employee_list'] = array_values($_SESSION['employee_list']);
        }
    }
}
    $controller_employee = new EmployeeController();
    if (isset($_POST['button_add_employee'])) {
        $controller_employee->createEmployee();
        header("Location: ../view/employee_view.php");
        exit();
    }
    if (isset($_GET['delete_employee_index'])) {
        $controller_employee->deleteEmployee($_GET['delete_employee_index']);
        header("Location: ../view/employee_view.php");
        exit();
    }

?>