<?php
require '../../controller/controller.php';
require '../../vendor/autoload.php';

$simpananAnggota = simpananAnggota();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No.');
$sheet->setCellValue('B1', 'Tanggal Simpanan');
$sheet->setCellValue('C1', 'Nomor Anggota');
$sheet->setCellValue('D1', 'Nama Anggota');
$sheet->setCellValue('E1', 'Jenis Simpanan');
$sheet->setCellValue('F1', 'Jumlah Simpanan');

$i = 2;
foreach ($simpananAnggota as $row) {
    $sheet->setCellValue('A' . $i, $i - 1);
    $sheet->setCellValue('B' . $i, $row['Tgl_simpanan']);
    $sheet->setCellValue('C' . $i, $row['ID_simpanan']);
    $sheet->setCellValue('D' . $i, $row['Nama_anggota']);
    $sheet->setCellValue('E' . $i, $row['Keterangan_simpanan']);
    $sheet->setCellValue('F' . $i, $row['Penarikan']);

    $i++;
}

$totalJumlahSimpanan = 0;

foreach ($simpananAnggota as $row) {
    $totalJumlahSimpanan += $row['Penarikan'];
}

$totalJumlahSimpananFormatted = 'Rp. ' . number_format($totalJumlahSimpanan, 2);

$sheet->setCellValue('A' . ($i + 1), 'Total Jumlah Simpanan:');
$sheet->setCellValue('F' . ($i + 1), $totalJumlahSimpananFormatted);

$styleArray = [
    'font' => [
        'bold' => true,
    ],
];
$sheet->getStyle('A' . ($i + 1) . ':F' . ($i + 1))->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$filename = 'laporan_simpanan.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
?>
