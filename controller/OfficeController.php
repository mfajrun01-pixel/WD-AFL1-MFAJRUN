<?php
require_once("../model/OfficeModel.php");

class OfficeController {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_save_path(sys_get_temp_dir());
            session_start();
        }
        if (!isset($_SESSION['office_list'])) {
            $_SESSION['office_list'] = array();
        }
    }

    public function createOffice() {
        $name = $_POST['inputName'];
        $address = $_POST['inputAddress'];
        $city = $_POST['inputCity'];
        $phone = $_POST['inputPhone'];

        $office = new OfficeModel($name, $address, $city, $phone);
        array_push($_SESSION['office_list'], $office);
    }

    public function getAllOffices() {
        return $_SESSION['office_list'];
    }

    public function deleteOffice($index) {
        if (isset($_SESSION['office_list'][$index])) {
            unset($_SESSION['office_list'][$index]);
            $_SESSION['office_list'] = array_values($_SESSION['office_list']);
        }
    }
}

$controller_office = new OfficeController();
if (isset($_POST['button_add_office'])) {
    $controller_office->createOffice();
    header("Location: ../view/office_view.php");
    exit();
}
if (isset($_GET['delete_office_index'])) {
    $controller_office->deleteOffice($_GET['delete_office_index']);
    header("Location: ../view/office_view.php");
    exit();
}