<?php
    require '../../controller/controller.php';

    $id = $_GET['id'];
    $angsuran = tampilData("SELECT * FROM angsuran WHERE ID_angsuran = '$id'")[0];
    
    if( isset($_POST["submit"]) ){
        
        if( updateAngsuran($_POST) > 0 ){
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'laporan_data_angsuran.php';
                </script>";
        }else{
            echo "<script>
                    alert('data gagal diubah!');
                    document.location.href = 'laporan_data_angsuran.php';
                </script>"; 
        }
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
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="ID_angsuran" id="ID_angsuran"  value="<?= $angsuran["ID_angsuran"]?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="ID_pinjaman">ID Pinjaman:</label>
                            <input type="text" class="form-control" name="ID_pinjaman" id="ID_pinjaman" value="<?= $angsuran['ID_pinjaman'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_anggota">No Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" id="No_anggota" value="<?= $angsuran['No_anggota'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Nama_anggota">Nama Anggota:</label>
                            <input type="text" class="form-control" name="Nama_anggota" id="Nama_anggota" value="<?= $angsuran['Nama_anggota'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="NIK">NIK:</label>
                            <input type="text" class="form-control" name="NIK" id="NIK" value="<?= $angsuran['NIK'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_angsuran">Tanggal Angsuran:</label>
                            <input type="date" class="form-control" name="Tanggal_angsuran" id="Tanggal_angsuran" value="<?= $angsuran['Tanggal_angsuran'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_bayar">Tanggal Bayar:</label>
                            <input type="date" class="form-control" name="Tanggal_bayar" id="Tanggal_bayar" value="<?= $angsuran['Tanggal_bayar'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Angsuran_ke">Angsuran ke:</label>
                            <input type="text" class="form-control" name="Angsuran_ke" id="Angsuran_ke" value="<?= $angsuran['Angsuran_ke'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Jumlah_angsuran">Jumlah Angsuran:</label>
                            <input type="number" class="form-control" name="Jumlah_angsuran" id="Jumlah_angsuran" step="0.01" value="<?= $angsuran['Jumlah_angsuran'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Denda">Denda:</label>
                            <input type="number" class="form-control" name="Denda" id="Denda" step="0.01" value="<?= $angsuran['Denda'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Total_bayar">Total Bayar:</label>
                            <input type="number" class="form-control" name="Total_bayar" id="Total_bayar" step="0.01" value="<?= $angsuran['Total_bayar'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Sisa_pinjaman_akhir">Sisa Pinjaman Akhir:</label>
                            <input type="number" class="form-control" name="Sisa_pinjaman_akhir" id="Sisa_pinjaman_akhir" step="0.01" value="<?= $angsuran['Sisa_pinjaman_akhir'] ?>" required>
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
