<?php
// Membaca data dari form
$ID_angsuran = $_POST['ID_angsuran'];
$ID_pinjaman = $_POST['ID_pinjaman'];
$No_anggota = $_POST['No_anggota'];
$Nama_anggota = $_POST['Nama_anggota'];
$NIK = $_POST['NIK'];
$Tanggal_angsuran = $_POST['Tanggal_angsuran'];
$Tanggal_bayar = $_POST['Tanggal_bayar'];
$Angsuran_ke = $_POST['Angsuran_ke'];
$Jumlah_angsuran = $_POST['Jumlah_angsuran'];
$Denda = $_POST['Denda'];
$Total_bayar = $_POST['Total_bayar'];
$Sisa_pinjaman_akhir = $_POST['Sisa_pinjaman_akhir'];

// Melakukan koneksi ke database (ganti sesuai dengan konfigurasi database Anda)
$host = 'localhost';
$db   = 'nama_database';
$user = 'nama_pengguna';
$pass = 'kata_sandi';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Menyimpan data angsuran ke dalam tabel angsuran
    $sql = "INSERT INTO angsuran (ID_angsuran, ID_pinjaman, No_anggota, Nama_anggota, NIK, Tanggal_angsuran, Tanggal_bayar, Angsuran_ke, Jumlah_angsuran, Denda, Total_bayar, Sisa_pinjaman_akhir) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ID_angsuran, $ID_pinjaman, $No_anggota, $Nama_anggota, $NIK, $Tanggal_angsuran, $Tanggal_bayar, $Angsuran_ke, $Jumlah_angsuran, $Denda, $Total_bayar, $Sisa_pinjaman_akhir]);

    echo "Data angsuran berhasil disimpan.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi database
$pdo = null;
?>
