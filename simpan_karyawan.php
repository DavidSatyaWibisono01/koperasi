<?php
// Mendapatkan data dari form
$NIK = $_POST['NIK'];
$Nama_karyawan = $_POST['Nama_karyawan'];
$Alamat = $_POST['Alamat'];
$Kota = $_POST['Kota'];
$Kode_pos = $_POST['Kode_pos'];
$Tempat_lahir = $_POST['Tempat_lahir'];
$Tanggal_lahir = $_POST['Tanggal_lahir'];
$Umur = $_POST['Umur'];
$Status_karyawan = $_POST['Status_karyawan'];
$No_telepon = $_POST['No_telepon'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memasukkan data karyawan ke tabel
$query = "INSERT INTO karyawan (NIK, Nama_karyawan, Alamat, Kota, Kode_pos, Tempat_lahir, Tanggal_lahir, Umur, Status_karyawan, No_telepon) 
          VALUES ('$NIK', '$Nama_karyawan', '$Alamat', '$Kota', '$Kode_pos', '$Tempat_lahir', '$Tanggal_lahir', '$Umur', '$Status_karyawan', '$No_telepon')";
$result = mysqli_query($conn, $query);

// Cek jika data berhasil dimasukkan atau terjadi kesalahan
if ($result) {
    echo "Data karyawan berhasil disimpan.";
} else {
    echo "Terjadi kesalahan saat menyimpan data karyawan: " . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
