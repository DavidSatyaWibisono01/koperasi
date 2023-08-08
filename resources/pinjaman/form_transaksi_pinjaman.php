<?php
    require '../../controller/controller.php';
    if( isset($_POST["submit"]) ){
        
        $ID_pinjaman = $_POST['ID_pinjaman'];
        $cek = mysqli_query($conn, "SELECT * FROM pinjaman WHERE ID_pinjaman = '$ID_pinjaman'");
        if( mysqli_num_rows($cek) === 0 ){

            $row = mysqli_fetch_assoc($cek);
            if( sTransaksiPinjaman($_POST) > 0 ){
                echo "
                    <script>
                        alert('Data Simpanan Berhasil Ditambahkan!');
                        document.location.href = '../../home.php';
                    </script>
                    ";
            }else{
                echo "
                    <script>
                        alert('Data Simpanan Gagal Ditambahkan');
                        document.location.href = '../../home.php';
                    </script>
                    ";
            }
        }
        $error = true;
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
                        <p class="error-message">Maaf, ID dengan nomor <?= $ID_pinjaman?> sudah tersedia. Silahkan input dengan ID yg berbeda!</p>
                    <?php endif; ?> 
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="ID_pinjaman">ID Pinjaman:</label>
                            <input type="text" class="form-control" name="ID_pinjaman" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" required>
                        </div>
            
                        <div class="form-group">
                            <label for="NIK">NIK:</label>
                            <input type="text" class="form-control" name="NIK" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_akun_piutang">No Akun Piutang:</label>
                            <input type="text" class="form-control" name="No_akun_piutang" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_pengaju">Tanggal Pengaju:</label>
                            <input type="date" class="form-control" name="Tanggal_pengaju" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_otorisasi">Tanggal Otorisasi:</label>
                            <input type="date" class="form-control" name="Tanggal_otorisasi" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Besar_pinjaman">Besar Pinjaman:</label>
                            <input type="text" class="form-control" name="Besar_pinjaman" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Jangka_waktu">Jangka Waktu (bulan):</label>
                            <input type="number" class="form-control" name="Jangka_waktu" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Angsuran_pokok">Angsuran Pokok:</label>
                            <input type="text" class="form-control" name="Angsuran_pokok" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Bunga_per_tahun">Bunga per Tahun:</label>
                            <input type="text" class="form-control" name="Bunga_per_tahun" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Bunga_per_bulan">Bunga per Bulan:</label>
                            <input type="text" class="form-control" name="Bunga_per_bulan" required>
                        </div>
            
                        <div class="form-group">
                            <label for="jumlah_angsuran">Jumlah Angsuran:</label>
                            <input type="text" class="form-control" name="jumlah_angsuran" required>
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
