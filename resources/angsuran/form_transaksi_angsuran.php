<?php
    require '../../controller/controller.php';
    if( isset($_POST["submit"]) ){
        
        $ID_angsuran = $_POST['ID_angsuran'];
        $cek = mysqli_query($conn, "SELECT * FROM angsuran WHERE ID_angsuran = '$ID_angsuran'");
        if( mysqli_num_rows($cek) === 0 ){

            $row = mysqli_fetch_assoc($cek);
            if( sTransaksiAngsuran($_POST) > 0 ){
                echo "
                    <script>
                        alert('Data Angsuran Berhasil Ditambahkan!');
                        document.location.href = '../../home.php';
                    </script>
                    ";
            }else{
                echo "
                    <script>
                        alert('Data Angsuran Gagal Ditambahkan');
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
    <title>Form Data Angsuran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="card-body">                    
                    <h2>Form Data Angsuran</h2>
                    <?php if (isset($error)) : ?>
                        <p class="error-message">Maaf, ID dengan nomor <?= $ID_angsuran?> sudah tersedia. Silahkan input dengan ID yg berbeda!</p>
                    <?php endif; ?> 
                    <div class="text-right mt-4">
                        <a href="export.php" class="btn btn-success">Export Excel</a>
                        <a href="form_transaksi_pinjaman.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="ID_angsuran">ID Angsuran:</label>
                            <input type="text" class="form-control" name="ID_angsuran" id="ID_angsuran" required>
                        </div>
            
                        <div class="form-group">
                            <label for="ID_pinjaman">ID Pinjaman:</label>
                            <input type="text" class="form-control" name="ID_pinjaman" id="ID_pinjaman" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" id="No_anggota" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Nama_anggota">Nama Anggota:</label>
                            <input type="text" class="form-control" name="Nama_anggota" id="Nama_anggota" required>
                        </div>
            
                        <div class="form-group">
                            <label for="NIK">NIK:</label>
                            <input type="text" class="form-control" name="NIK" id="NIK" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_angsuran">Tanggal Angsuran:</label>
                            <input type="date" class="form-control" name="Tanggal_angsuran" id="Tanggal_angsuran" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_bayar">Tanggal Bayar:</label>
                            <input type="date" class="form-control" name="Tanggal_bayar" id="Tanggal_bayar" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Angsuran_ke">Angsuran ke:</label>
                            <input type="text" class="form-control" name="Angsuran_ke" id="Angsuran_ke" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Jumlah_angsuran">Jumlah Angsuran:</label>
                            <input type="number" class="form-control" name="Jumlah_angsuran" id="Jumlah_angsuran" step="0.01" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Denda">Denda:</label>
                            <input type="number" class="form-control" name="Denda" id="Denda" step="0.01" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Total_bayar">Total Bayar:</label>
                            <input type="number" class="form-control" name="Total_bayar" id="Total_bayar" step="0.01" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Sisa_pinjaman_akhir">Sisa Pinjaman Akhir:</label>
                            <input type="number" class="form-control" name="Sisa_pinjaman_akhir" id="Sisa_pinjaman_akhir" step="0.01" required>
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
