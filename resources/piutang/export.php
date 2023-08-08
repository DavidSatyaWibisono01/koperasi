<?php
    require '../../controller/controller.php';
    require '../../vendor/autoload.php'; // Load library PHPExcel
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $piutang = getPiutangData();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Header kolom
    $sheet->setCellValue('A1', 'No. Akun Piutang');
    $sheet->setCellValue('B1', 'Keterangan');
    $sheet->setCellValue('C1', 'Saldo Piutang Anggota');
    
    $i = 2; // Mulai baris data

    foreach ($piutang as $row) {
        $sheet->setCellValue('A' . $i, $row['No_akun_piutang']);
        $sheet->setCellValue('B' . $i, $row['Keterangan']);
        $sheet->setCellValue('C' . $i, $row['Saldo_piutang_anggota']);
        $i++;
    }

    // Simpan file Excel
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan_piutang.xlsx';
    $writer->save($filename);

    // Download file Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
    unlink($filename); // Hapus file setelah di-download
?>
