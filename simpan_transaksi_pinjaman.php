<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari form
$ID_pinjaman = $_POST['ID_pinjaman'];
$No_anggota = $_POST['No_anggota'];
$NIK = $_POST['NIK'];
$No_akun_piutang = $_POST['No_akun_piutang'];
$Tanggal_pengaju = $_POST['Tanggal_pengaju'];
$Tanggal_otorisasi = $_POST['Tanggal_otorisasi'];
$Besar_pinjaman = $_POST['Besar_pinjaman'];
$Jangka_waktu = $_POST['Jangka_waktu'];
$Angsuran_pokok = $_POST['Angsuran_pokok'];
$Bunga_per_tahun = $_POST['Bunga_per_tahun'];
$Bunga_per_bulan = $_POST['Bunga_per_bulan'];
$jumlah_angsuran = $_POST['jumlah_angsuran'];

// Query SQL untuk menyimpan data ke tabel pinjaman
$sql = "INSERT INTO pinjaman (ID_pinjaman, No_anggota, NIK, No_akun_piutang, Tanggal_pengaju, Tanggal_otorisasi, Besar_pinjaman, Jangka_waktu, Angsuran_pokok, `Bunga/Tahun`, `Bunga/Bulan`, jumlah_angsuran)
        VALUES ('$ID_pinjaman', '$No_anggota', '$NIK', '$No_akun_piutang', '$Tanggal_pengaju', '$Tanggal_otorisasi', '$Besar_pinjaman', '$Jangka_waktu', '$Angsuran_pokok', '$Bunga_per_tahun', '$Bunga_per_bulan', '$jumlah_angsuran')";

if (mysqli_query($conn, $sql)) {
    echo "Data pinjaman berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
