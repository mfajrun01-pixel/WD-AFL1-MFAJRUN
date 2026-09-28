<?php
    require_once("../controller/EmployeeController.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Management - MVC PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-white">

        <!-- Container Kotak Utama -->
        <div class="container border border-secondary p-0 mt-4 mb-4" style="max-width: 600px;">
            
            <!-- Menu Navigasi Paling Atas -->
            <div class="bg-primary-subtle px-3 py-2 border-bottom border-secondary fw-bold fs-6">
                <a href="employee_view.php" class="text-dark text-decoration-none">Employee</a>
                &nbsp;|&nbsp;
                <a href="office_view.php" class="text-dark text-decoration-none">Office</a>
                &nbsp;|&nbsp;
                <a href="office_employee_view.php" class="text-dark text-decoration-none">Office-Employees</a>
            </div>

            <div class="p-4">
                <h2 class="mb-4 text-center">List Karyawan</h2>

                <div class="card shadow-sm mb-4 border-0">
                    <div class="card-body p-0">
                        <table class="table table-dark table-striped mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Usia</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $employees = $controller_employee->getAllEmployees();
                                if (empty($employees)) {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data karyawan.</td>
                                </tr>
                                <?php
                                } else {
                                    $counter = 0;
                                    foreach ($employees as $index => $emp) {
                                        $counter++;
                                ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $counter ?></th>
                                    <td class="text-center"><?= $emp->getName() ?></td>
                                    <td class="text-center"><?= $emp->getJabatan() ?></td>
                                    <td class="text-center"><?= $emp->getUmur() ?></td>
                                    <td class="text-center">
                                        <a href="../controller/EmployeeController.php?delete_employee_index=<?= $index ?>"
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
                    <div class="mb-3 text-black">
                        <h2 class="mb-0 text-center fs-4">Tambah Karyawan</h2>
                    </div>
                    <div>
                        <form action="../controller/EmployeeController.php?action=save" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text"
                                       class="form-control"
                                       id="nama"
                                       name="inputNama"
                                       required="required">
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text"
                                       class="form-control"
                                       id="jabatan"
                                       name="inputJabatan"
                                       required="required">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number"
                                       class="form-control"
                                       id="umur"
                                       name="inputUmur"
                                       required="required">
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <button type="submit" name="button_add_employee" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>