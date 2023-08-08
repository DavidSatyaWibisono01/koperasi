<?php
require '../../vendor/autoload.php';

include '../../controller/controller.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No.');
$sheet->setCellValue('B1', 'Nomor Anggota');
$sheet->setCellValue('C1', 'Nama Anggota');
$sheet->setCellValue('D1', 'Alamat');
$sheet->setCellValue('E1', 'Kota');
$sheet->setCellValue('F1', 'Tanggal Lahir');
$sheet->setCellValue('G1', 'No. KTP');
$sheet->setCellValue('H1', 'Jenis Kelamin');
$sheet->setCellValue('I1', 'Telepon');
$sheet->setCellValue('J1', 'Pendidikan');
$sheet->setCellValue('K1', 'Pekerjaan/Jabatan');
$sheet->setCellValue('L1', 'Tanggal Masuk');
$sheet->setCellValue('M1', 'Simpanan Pokok');
$sheet->setCellValue('N1', 'SMK');

$anggotas = tampilData("SELECT * FROM anggota ORDER BY No_anggota DESC");

$row = 2;
$i = 1;
foreach ($anggotas as $anggota) {
    $sheet->setCellValue('A' . $row, $i);
    $sheet->setCellValue('B' . $row, $anggota["No_anggota"]);
    $sheet->setCellValue('C' . $row, $anggota["Nama_anggota"]);
    $sheet->setCellValue('D' . $row, $anggota["Alamat"]);
    $sheet->setCellValue('E' . $row, $anggota["Kota"]);
    $sheet->setCellValue('F' . $row, $anggota["Tanggal_lahir"]);
    $sheet->setCellValue('G' . $row, $anggota["No_KTP"]);
    $sheet->setCellValue('H' . $row, $anggota["Jenis_kelamin"]);
    $sheet->setCellValue('I' . $row, $anggota["Telepon"]);
    $sheet->setCellValue('J' . $row, $anggota["Pendidikan"]);
    $sheet->setCellValue('K' . $row, $anggota["Pekerjaan_Jabatan"]);
    $sheet->setCellValue('L' . $row, $anggota["Tanggal_masuk"]);
    $sheet->setCellValue('M' . $row, $anggota["Simpanan_pokok"]);
    $sheet->setCellValue('N' . $row, $anggota["smk"]);
    $row++;
    $i++;
}

$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_anggota.xlsx"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
