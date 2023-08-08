<?php
    require '../../controller/controller.php';
    require '../../vendor/autoload.php';

    $pinjamanAnggota = pinjamanAnggota();

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No.');
    $sheet->setCellValue('B1', 'ID Pinjaman');
    $sheet->setCellValue('C1', 'Nomor Akun Piutang');
    $sheet->setCellValue('D1', 'Nama Anggota');
    $sheet->setCellValue('E1', 'Besar Pinjaman');
    $sheet->setCellValue('F1', 'Jangka Waktu');
    $sheet->setCellValue('G1', 'Bunga/Bulan');
    $sheet->setCellValue('H1', 'Jumlah Angsuran');

    $i = 2;
    foreach ($pinjamanAnggota as $row) {
        $sheet->setCellValue('A' . $i, $i - 1);
        $sheet->setCellValue('B' . $i, $row['ID_pinjaman']);
        $sheet->setCellValue('C' . $i, $row['No_akun_piutang']);
        $sheet->setCellValue('D' . $i, $row['Nama_anggota']);
        $sheet->setCellValue('E' . $i, $row['Besar_pinjaman']);
        $sheet->setCellValue('F' . $i, $row['Jangka_waktu']);
        $sheet->setCellValue('G' . $i, $row['Bunga/Bulan']);
        $sheet->setCellValue('H' . $i, $row['jumlah_angsuran']);

        $i++;
    }

    $totalJumlahPinjaman = 0;
    $totalJumlahAngsuran = 0;

    foreach ($pinjamanAnggota as $row) {
        $totalJumlahPinjaman += $row['Besar_pinjaman'];
        $totalJumlahAngsuran += $row['Bunga/Bulan'];
    }

    $totalJumlahPinjamanFormatted = 'Rp. ' . number_format($totalJumlahPinjaman, 2);
    $totalJumlahAngsuranFormatted = number_format($totalJumlahAngsuran) . ' Bulan';

    $sheet->setCellValue('A' . ($i + 1), 'Total Jumlah Pinjaman:');
    $sheet->setCellValue('F' . ($i + 1), $totalJumlahPinjamanFormatted);
    $sheet->setCellValue('A' . ($i + 2), 'Total Jumlah Simpanan:');
    $sheet->setCellValue('F' . ($i + 2), $totalJumlahAngsuranFormatted);
    
    $styleArray = [
        'font' => [
            'bold' => true,
        ],
    ];
    
    $sheet->getStyle('A' . ($i + 1))->applyFromArray($styleArray);
    $sheet->getStyle('F' . ($i + 1))->applyFromArray($styleArray);
    $sheet->getStyle('A' . ($i + 2))->applyFromArray($styleArray);
    $sheet->getStyle('F' . ($i + 2))->applyFromArray($styleArray);

    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan_pinjaman.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
?>
