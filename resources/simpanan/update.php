<?php
    require '../../controller/controller.php';

    $id = $_GET['id'];
    $simpanan = tampilData("SELECT * FROM simpanan WHERE ID_simpanan = '$id'")[0];
    
    if( isset($_POST["submit"]) ){
        
        if( updateSimpanan($_POST) > 0 ){
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'laporan_data_simpanan.php';
                </script>";
        }else{
            echo "<script>
                    alert('data gagal diubah!');
                    document.location.href = 'laporan_data_simpanan.php';
                </script>"; 
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
                            <input type="hidden" class="form-control" name="ID_simpanan" value="<?= $simpanan['ID_simpanan'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No. Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" value="<?= $simpanan['No_anggota'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="Tgl_simpanan">Tanggal Simpanan:</label>
                            <input type="date" class="form-control" name="Tgl_simpanan" value="<?= $simpanan['Tgl_simpanan'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="NIK">NIK Karyawan:</label>
                            <input type="text" class="form-control" name="NIK" value="<?= $simpanan['NIK'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="No_akun_kas">No. Akun Kas:</label>
                            <input type="text" class="form-control" name="No_akun_kas" value="<?= $simpanan['No_akun_kas'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="Setoran">Setoran:</label>
                            <input type="text" class="form-control" name="Setoran" value="<?= $simpanan['Setoran'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="Penarikan">Penarikan:</label>
                            <input type="text" class="form-control" name="Penarikan" value="<?= $simpanan['Penarikan'] ?>">
                        </div>
            
                        <div class="form-group">
                            <label for="Keterangan_simpanan">Keterangan Simpanan:</label>
                            <select class="form-control" name="Keterangan_simpanan">
                                <?= generateKeteranganOptions($simpanan['Keterangan_simpanan']); ?>
                            </select>
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
