<?php
require '../../controller/controller.php';
require '../../vendor/autoload.php'; // Ubah sesuai dengan lokasi autoload.php dari PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$pinjamanAnggota = AngsuranData();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menambahkan judul pada sheet
$sheet->setCellValue('A1', 'Laporan Data Angsuran');

// Menambahkan header kolom
$sheet->setCellValue('A3', 'No.');
$sheet->setCellValue('B3', 'ID Angsuran');
$sheet->setCellValue('C3', 'ID Pinjaman');
$sheet->setCellValue('D3', 'Nomor Anggota');
$sheet->setCellValue('E3', 'Nama Anggota');
$sheet->setCellValue('F3', 'NIK');
$sheet->setCellValue('G3', 'Tanggal Angsuran');
// Tambahkan kolom lainnya sesuai kebutuhan

// Menambahkan data dari array $pinjamanAnggota ke dalam sheet
$row = 4;
$i = 1;
foreach ($pinjamanAnggota as $data) {
    $sheet->setCellValue('A' . $row, $i);
    $sheet->setCellValue('B' . $row, $data['ID_angsuran']);
    $sheet->setCellValue('C' . $row, $data['ID_pinjaman']);
    $sheet->setCellValue('D' . $row, $data['No_anggota']);
    $sheet->setCellValue('E' . $row, $data['Nama_anggota']);
    $sheet->setCellValue('F' . $row, $data['NIK']);
    $sheet->setCellValue('G' . $row, $data['Tanggal_angsuran']);
    // Tambahkan data untuk kolom lainnya sesuai kebutuhan

    $i++;
    $row++;
}

// Simpan file Excel
$filename = 'laporan_data_angsuran.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Mengatur header untuk mengunduh file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Outputkan file Excel ke browser
$writer->save('php://output');
