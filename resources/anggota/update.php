<?php
    require '../../controller/controller.php';

    $id = $_GET['id'];
    $anggota = tampilData("SELECT * FROM anggota WHERE No_anggota = '$id'");
    
    if( isset($_POST["submit"]) ){
        print_r($_POST);
        
        if( updateAnggota($_POST) > 0 ){
            echo "<script>
            alert('data gagal diubah!');
            document.location.href = 'laporan_anggota.php';
            </script>";
        }else{
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'laporan_anggota.php';
                </script>";
        }
    }

    $query = "SELECT * FROM jenis_kelamin";
    $result = mysqli_query($conn, $query);
    $jenis_kelamin_options = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $jenis_kelamin_options .= "<option value='" . $row['ID'] . "'>" . $row['Jenis_kelamin'] . "</option>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 40rem;">
                <div class="card-body"> 
                    <h2 class="mb-4">Ubah Data Anggota</h2>
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="No_anggota" name="No_anggota" value="<?= $anggota[0]['No_anggota'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Nama_anggota" class="form-label">Nama Anggota</label>
                            <input type="text" class="form-control" id="Nama_anggota" name="Nama_anggota" value="<?= $anggota[0]['Nama_anggota'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?= $anggota[0]['Alamat'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Kota">Kota:</label>
                            <input type="text" class="form-control" name="Kota" id="Kota" value="<?= $anggota[0]['Kota'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Kode_pos">Kode Pos:</label>
                            <input type="text" class="form-control" name="Kode_pos" id="Kode_pos" value="<?= $anggota[0]['Kode_pos'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" name="Tempat_lahir" id="Tempat_lahir" value="<?= $anggota[0]['Tempat_lahir'] ?>" required> 
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" name="Tanggal_lahir" id="Tanggal_lahir" value="<?= $anggota[0]['Tanggal_lahir'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Umur">Umur:</label>
                            <input type="text" class="form-control" name="Umur" id="Umur" value="<?= $anggota[0]['Umur'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="No_KTP">No. KTP:</label>
                            <input type="text" class="form-control" name="No_KTP" id="No_KTP" value="<?= $anggota[0]['No_KTP'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" name="Jenis_kelamin" id="Jenis_kelamin" value="<?= $anggota[0]['Jenis_kelamin'] ?>" required>
                                <?= $jenis_kelamin_options; ?>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="Telepon">Telepon:</label>
                            <input type="text" class="form-control" name="Telepon" id="Telepon" value="<?= $anggota[0]['Telepon'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Pendidikan">Pendidikan:</label>
                            <input type="text" class="form-control" name="Pendidikan" id="Pendidikan" value="<?= $anggota[0]['Pendidikan'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Pekerjaan_Jabatan">Pekerjaan/Jabatan:</label>
                            <input type="text" class="form-control" name="Pekerjaan_Jabatan" id="Pekerjaan_Jabatan" value="<?= $anggota[0]['Pekerjaan_Jabatan'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_masuk">Tanggal Masuk:</label>
                            <input type="date" class="form-control" name="Tanggal_masuk" id="Tanggal_masuk" value="<?= $anggota[0]['Tanggal_masuk'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Simpanan_pokok">Simpanan Pokok:</label>
                            <input type="text" class="form-control" name="Simpanan_pokok" id="Simpanan_pokok" value="<?= $anggota[0]['Simpanan_pokok'] ?>" required>
                        </div>
            
                        <div class="form-group">
                            <label for="smk">Simpanan sukarela:</label>
                            <input type="text" class="form-control" name="smk" id="smk" value="<?= $anggota[0]['smk'] ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
                        <a href="laporan_anggota.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
