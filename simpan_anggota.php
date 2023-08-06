Berikut adalah contoh kode PHP untuk file `submit_form.php` yang akan memproses data yang dikirimkan melalui form dan menyimpannya ke dalam tabel `anggota`:

```php
<?php
// Mendapatkan data dari form
$No_anggota = $_POST['No_anggota'];
$Nama_anggota = $_POST['Nama_anggota'];
$Alamat = $_POST['Alamat'];
$Kota = $_POST['Kota'];
$Kode_pos = $_POST['Kode_pos'];
$Tempat_lahir = $_POST['Tempat_lahir'];
$Tanggal_lahir = $_POST['Tanggal_lahir'];
$Umur = $_POST['Umur'];
$No_KTP = $_POST['No_KTP'];
$Jenis_kelamin = $_POST['Jenis_kelamin'];
$Telepon = $_POST['Telepon'];
$Pendidikan = $_POST['Pendidikan'];
$Pekerjaan_Jabatan = $_POST['Pekerjaan_Jabatan'];
$Tanggal_masuk = $_POST['Tanggal_masuk'];
$Simpanan_pokok = $_POST['Simpanan_pokok'];
$smk = $_POST['smk'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memasukkan data anggota ke tabel
$query = "INSERT INTO anggota (No_anggota, Nama_anggota, Alamat, Kota, Kode_pos, Tempat_lahir, Tanggal_lahir, Umur, No_KTP, Jenis_kelamin, Telepon, Pendidikan, Pekerjaan_Jabatan, Tanggal_masuk, Simpanan_pokok, smk) 
          VALUES ('$No_anggota', '$Nama_anggota', '$Alamat', '$Kota', '$Kode_pos', '$Tempat_lahir', '$Tanggal_lahir', '$Umur', '$No_KTP', '$Jenis_kelamin', '$Telepon', '$Pendidikan', '$Pekerjaan_Jabatan', '$Tanggal_masuk', '$Simpanan_pokok', '$smk')";
$result = mysqli_query($conn, $query);

// Cek jika data berhasil dimasukkan atau terjadi kesalahan
if ($result) {
    echo "Data anggota berhasil disimpan.";
} else {
    echo "Terjadi kesalahan saat menyimpan data anggota: " . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
```