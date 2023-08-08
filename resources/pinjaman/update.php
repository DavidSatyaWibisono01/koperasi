<?php
    require '../../controller/controller.php';

    $id = $_GET['id'];
    $pinjamanData = tampilData("SELECT * FROM pinjaman WHERE ID_pinjaman = '$id'");

    $pinjaman = $pinjamanData[0];

    if (isset($_POST["submit"])) {
        if (updatePinjaman($_POST) > 0) {
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'laporan_data_pinjaman.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal diubah!');
                    document.location.href = 'laporan_data_pinjaman.php';
                </script>"; 
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Transaksi Pinjaman Tahunan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h2>Form Transaksi Pinjaman Tahunan</h2>
                    <?php if (isset($error)) : ?>
                        <p class="error-message">Maaf, ID dengan nomor <?= $ID_pinjaman ?> sudah tersedia. Silahkan input dengan ID yang berbeda!</p>
                    <?php endif; ?> 
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="ID_pinjaman" value="<?= $pinjaman['ID_pinjaman'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" value="<?= $pinjaman['No_anggota'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="NIK">NIK:</label>
                            <input type="text" class="form-control" name="NIK" value="<?= $pinjaman['NIK'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="No_akun_piutang">No Akun Piutang:</label>
                            <input type="text" class="form-control" name="No_akun_piutang" value="<?= $pinjaman['No_akun_piutang'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Tanggal_pengaju">Tanggal Pengaju:</label>
                            <input type="date" class="form-control" name="Tanggal_pengaju" value="<?= $pinjaman['Tanggal_pengaju'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Tanggal_otorisasi">Tanggal Otorisasi:</label>
                            <input type="date" class="form-control" name="Tanggal_otorisasi" value="<?= $pinjaman['Tanggal_otorisasi'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Besar_pinjaman">Besar Pinjaman:</label>
                            <input type="text" class="form-control" name="Besar_pinjaman" value="<?= $pinjaman['Besar_pinjaman'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Jangka_waktu">Jangka Waktu (bulan):</label>
                            <input type="number" class="form-control" name="Jangka_waktu" value="<?= $pinjaman['Jangka_waktu'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Angsuran_pokok">Angsuran Pokok:</label>
                            <input type="text" class="form-control" name="Angsuran_pokok" value="<?= $pinjaman['Angsuran_pokok'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Bunga/Tahun">Bunga per Tahun:</label>
                            <input type="text" class="form-control" name="Bunga/Tahun" value="<?= $pinjaman['Bunga/Tahun'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Bunga/Bulan">Bunga per Bulan:</label>
                            <input type="text" class="form-control" name="Bunga/Bulan" value="<?= $pinjaman['Bunga/Bulan'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_angsuran">Jumlah Angsuran:</label>
                            <input type="text" class="form-control" name="jumlah_angsuran" value="<?= $pinjaman['jumlah_angsuran'] ?>" required>
                        </div>
            
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="../../home.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
