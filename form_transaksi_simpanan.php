<?php
    require 'controller/controller.php';
    if( isset($_POST["submit"]) ){
            
        if( sTransaksiSimpanan($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Simpanan Berhasil Ditambahkan!');
                    document.location.href = 'home.php';
                </script>
                ";
        }else{
            echo "
                <script>
                    alert('Data Simpanan Gagal Ditambahkan');
                    document.location.href = 'home.php';
                </script>
                ";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Transaksi Simpanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h2>Form Transaksi Simpanan</h2>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="ID_simpanan">ID Simpanan:</label>
                            <input type="text" class="form-control" name="ID_simpanan" id="ID_simpanan" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No. Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" id="No_anggota">
                        </div>
            
                        <div class="form-group">
                            <label for="Tgl_simpanan">Tanggal Simpanan:</label>
                            <input type="date" class="form-control" name="Tgl_simpanan" id="Tgl_simpanan">
                        </div>
            
                        <div class="form-group">
                            <label for="NIK">NIK Karyawan:</label>
                            <input type="text" class="form-control" name="NIK" id="NIK">
                        </div>
            
                        <div class="form-group">
                            <label for="No_akun_kas">No. Akun Kas:</label>
                            <input type="text" class="form-control" name="No_akun_kas" id="No_akun_kas">
                        </div>
            
                        <div class="form-group">
                            <label for="Setoran">Setoran:</label>
                            <input type="text" class="form-control" name="Setoran" id="Setoran">
                        </div>
            
                        <div class="form-group">
                            <label for="Penarikan">Penarikan:</label>
                            <input type="text" class="form-control" name="Penarikan" id="Penarikan">
                        </div>
            
                        <div class="form-group">
                            <label for="Keterangan_simpanan">Keterangan Simpanan:</label>
                            <select class="form-control" name="Keterangan_simpanan" id="Keterangan_simpanan">
                                <?= generateKeteranganOptions(); ?>
                            </select>
                        </div>
            
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a href="home.php" class="btn btn-secondary">Kembali</a>
                    </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
