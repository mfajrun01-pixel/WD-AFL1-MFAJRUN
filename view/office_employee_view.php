<?php
require_once("../controller/OfficeEmployeeController.php");
require_once("../controller/EmployeeController.php");
require_once("../controller/OfficeController.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Office Employees</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-white">

        <div class="container border border-secondary p-0 mt-4 mb-4" style="max-width: 500px;">
            <div class="bg-primary-subtle px-3 py-2 border-bottom border-secondary fw-bold fs-6">
                <a href="employee_view.php" class="text-dark text-decoration-none">Employee</a>
                &nbsp;|&nbsp;
                <a href="office_view.php" class="text-dark text-decoration-none">Office</a>
                &nbsp;|&nbsp;
                <a href="office_employee_view.php" class="text-dark text-decoration-none">Office-Employees</a>
            </div>

            <div class="px-4 pb-5 pt-3">
                <?php
                $controller_employee = new EmployeeController();
                $controller_office = new OfficeController();

                $officeEmployees = $controller_office_employee->getAllOfficeEmployees();
                $employeeList = $controller_employee->getAllEmployees();
                $officeList = $controller_office->getAllOffices();
                ?>

                <h2 class="text-center fw-bold fs-2 text-indigo mb-4" style="color: #3730a3;">Office Employees</h2>

                <div class="mb-5">
                    <table class="table table-bordered border-secondary mb-0">
                        <thead>
                            <tr class="table-primary">
                                <th class="border-secondary text-dark" style="width: 50%;">Employee</th>
                                <th class="border-secondary text-dark" style="width: 50%;">Office</th>
                                <th class="border-secondary text-dark text-center" style="width: 10%;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($officeEmployees)) { ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted border-secondary">Belum ada data relasi.</td>
                            </tr>
                            <?php } else { 
                                foreach ($officeEmployees as $oe) { ?>
                            <tr>
                                <td class="border-secondary"><?= htmlspecialchars($oe->getEmployee()->getName()) ?></td>
                                <td class="border-secondary"><?= htmlspecialchars($oe->getOffice()->getName()) ?></td>
                                <td class="text-center border-secondary">
                                    <a href="../controller/OfficeEmployeeController.php?delete_office_employee_index=<?= array_search($oe, $officeEmployees) ?>"
                                       class="btn btn-danger btn-sm py-0 px-2"
                                       onclick="return confirm('Yakin ingin menghapus relasi ini?')">Delete</a>
                                </td>
                            </tr>
                            <?php } 
                            } ?>
                        </tbody>
                    </table>
                </div>

                <form action="../controller/OfficeEmployeeController.php" method="POST">

                    <div class="mb-3 row align-items-center">
                        <label for="selectEmployee" class="col-sm-3 col-form-label fw-semibold text-dark">Employee</label>
                        <div class="col-sm-9">
                            <select class="form-select border-secondary rounded-0 shadow-none"
                                    id="selectEmployee"
                                    name="selectEmployee"
                                    required="required">
                                <option value="" selected="selected" disabled="disabled" hidden="hidden"></option>
                                <?php if (!empty($employeeList)) {
                                    foreach ($employeeList as $empIndex => $emp) { ?>
                                <option value="<?= $empIndex ?>"><?= htmlspecialchars($emp->getName()) ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="selectOffice" class="col-sm-3 col-form-label fw-semibold text-dark">Office</label>
                        <div class="col-sm-9">
                            <select class="form-select border-secondary rounded-0 shadow-none"
                                    id="selectOffice"
                                    name="selectOffice"
                                    required="required">
                                <option value="" selected="selected" disabled="disabled" hidden="hidden"></option>
                                <?php if (!empty($officeList)) {
                                    foreach ($officeList as $offIndex => $off) { ?>
                                <option value="<?= $offIndex ?>"><?= htmlspecialchars($off->getName()) ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit"
                                name="button_add_office_employee"
                                class="btn btn-primary-subtle border border-primary-subtle rounded-0 px-5 fw-medium"
                                style="background-color: #cfe2ff; color: #000000;">SAVE</button>
                    </div>

                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>