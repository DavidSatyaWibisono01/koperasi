<?php
// Mendapatkan data dari form
$ID_simpanan = $_POST['ID_simpanan'];
$No_anggota = $_POST['No_anggota'];
$Tgl_simpanan = $_POST['Tgl_simpanan'];
$NIK = $_POST['NIK'];
$No_akun_kas = $_POST['No_akun_kas'];
$Setoran = $_POST['Setoran'];
$Penarikan = $_POST['Penarikan'];
$Keterangan_simpanan = $_POST['Keterangan_simpanan'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memasukkan data transaksi simpanan ke tabel
$query = "INSERT INTO simpanan (ID_simpanan, No_anggota, Tgl_simpanan, NIK, No_akun_kas, Setoran, Penarikan, Keterangan_simpanan) 
          VALUES ('$ID_simpanan', '$No_anggota', '$Tgl_simpanan', '$NIK', '$No_akun_kas', '$Setoran', '$Penarikan', '$Keterangan_simpanan')";
$result = mysqli_query($conn, $query);

// Cek jika data berhasil dimasukkan atau terjadi kesalahan
if ($result) {
    echo "Data transaksi simpanan berhasil disimpan.";
} else {
    echo "Terjadi kesalahan saat menyimpan data transaksi simpanan: " . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
