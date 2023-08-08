<?php
require '../../controller/controller.php';
require '../../vendor/autoload.php'; // Sesuaikan path ke autoload.php dari PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$kasData = getKasData();

if (isset($_GET['export'])) {
    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Create a new Excel Writer
    $writer = new Xlsx($spreadsheet);

    // Set the column headers
    $spreadsheet->getActiveSheet()->setCellValue('A1', 'No. Akun Kas');
    $spreadsheet->getActiveSheet()->setCellValue('B1', 'Keterangan Kas');
    $spreadsheet->getActiveSheet()->setCellValue('C1', 'Saldo Kas Simpanan');

    // Fill the data
    $row = 2;
    foreach ($kasData as $data) {
        $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $data['No_akun_kas']);
        $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $data['Keterangan_kas']);
        $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $data['Saldo_kas_simpanan']);
        $row++;
    }

    // Set the filename and mime type
    $filename = 'laporan_data_kas.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Write the spreadsheet to the browser
    $writer->save('php://output');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Data Kas</h2>
        <div class="text-right mt-4">
            <a href="?export=1" class="btn btn-success">Export Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No. Akun Kas</th>
                        <th>Keterangan Kas</th>
                        <th>Saldo Kas Simpanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kasData as $row) {
                        echo "<tr>";
                        echo "<td>".$row['No_akun_kas']."</td>";
                        echo "<td>".$row['Keterangan_kas']."</td>";
                        echo "<td>".$row['Saldo_kas_simpanan']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
