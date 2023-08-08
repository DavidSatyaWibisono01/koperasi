<?php
require '../../vendor/autoload.php';

include '../../controller/controller.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No.');
$sheet->setCellValue('B1', 'NIK');
$sheet->setCellValue('C1', 'Nama Karyawan');
$sheet->setCellValue('D1', 'Alamat');
$sheet->setCellValue('E1', 'Kota');
$sheet->setCellValue('F1', 'Kode Pos');
$sheet->setCellValue('G1', 'Tempat Lahir');
$sheet->setCellValue('H1', 'Tanggal Lahir');
$sheet->setCellValue('I1', 'Umur');
$sheet->setCellValue('J1', 'Status Karyawan');
$sheet->setCellValue('K1', 'No. Telepon');

$anggotas = tampilData("SELECT * FROM karyawan ORDER BY NIK DESC");

$row = 2;
$i = 1;
foreach ($anggotas as $anggota) {
    $sheet->setCellValue('A' . $row, $i);
    $sheet->setCellValue('B' . $row, $anggota["NIK"]);
    $sheet->setCellValue('C' . $row, $anggota["Nama_karyawan"]);
    $sheet->setCellValue('D' . $row, $anggota["Alamat"]);
    $sheet->setCellValue('E' . $row, $anggota["Kota"]);
    $sheet->setCellValue('F' . $row, $anggota["Kode_pos"]);
    $sheet->setCellValue('G' . $row, $anggota["Tempat_lahir"]);
    $sheet->setCellValue('H' . $row, $anggota["Tanggal_lahir"]);
    $sheet->setCellValue('I' . $row, $anggota["Umur"]);
    $sheet->setCellValue('J' . $row, $anggota["Status_karyawan"]);
    $sheet->setCellValue('K' . $row, $anggota["No_telepon"]);
    $row++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_karyawan.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
