<?php
require_once("../controller/OfficeController.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Office Management - MVC PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-white">

        <div class="container border border-secondary p-0 mt-4 mb-4" style="max-width: 700px;">
            
            <div class="bg-primary-subtle px-3 py-2 border-bottom border-secondary fw-bold fs-6">
                <a href="employee_view.php" class="text-dark text-decoration-none">Employee</a>
                &nbsp;|&nbsp;
                <a href="office_view.php" class="text-dark text-decoration-none">Office</a>
                &nbsp;|&nbsp;
                <a href="office_employee_view.php" class="text-dark text-decoration-none">Office-Employees</a>
            </div>

            <div class="p-4">
                <h2 class="mb-4 text-center">List Offices</h2>

                <div class="card shadow-sm mb-4 border-0">
                    <div class="card-body p-0">
                        <table class="table table-dark table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">City</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $offices = $controller_office->getAllOffices();
                                if (empty($offices)) {
                                ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data office.</td>
                                </tr>
                                <?php
                                } else {
                                    $counter = 0;
                                    foreach ($offices as $index => $office) {
                                        $counter++;
                                ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $counter ?></th>
                                    <td class="text-center"><?= $office->getName() ?></td>
                                    <td class="text-center"><?= $office->getAddress() ?></td>
                                    <td class="text-center"><?= $office->getCity() ?></td>
                                    <td class="text-center"><?= $office->getPhone() ?></td>
                                    <td class="text-center">
                                        <a href="../controller/OfficeController.php?delete_office_index=<?= $index ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('jangan pecat saya mas?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mb-4 text-black">
                        <h2 class="mb-0 text-center fs-4">Tambah Office</h2>
                    </div>
                    <div>
                        <form action="../controller/OfficeController.php?action=save" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="inputName"
                                       required="required">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text"
                                       class="form-control"
                                       id="address"
                                       name="inputAddress"
                                       required="required">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text"
                                       class="form-control"
                                       id="city"
                                       name="inputCity"
                                       required="required">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number"
                                       class="form-control"
                                       id="phone"
                                       name="inputPhone"
                                       required="required">
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <button type="submit" name="button_add_office" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>