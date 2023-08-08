<?php
    require '../../controller/controller.php';

    if( isset($_POST["submit"]) ){
            
        if( inputDataAnggota($_POST) > 0 ){
            echo "<script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'laporan_anggota.php';
                </script>";
            }else{
                echo "<script>
                        alert('data gagal ditambahkan');
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
    <title>Form Data Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h2>Form Data Anggota</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="No_anggota">No. Anggota:</label>
                            <input type="text" class="form-control" name="No_anggota" id="No_anggota" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Nama_anggota">Nama Anggota:</label>
                            <input type="text" class="form-control" name="Nama_anggota" id="Nama_anggota">
                        </div>
            
                        <div class="form-group">
                            <label for="Alamat">Alamat:</label>
                            <input type="text" class="form-control" name="Alamat" id="Alamat">
                        </div>
            
                        <div class="form-group">
                            <label for="Kota">Kota:</label>
                            <input type="text" class="form-control" name="Kota" id="Kota">
                        </div>
            
                        <div class="form-group">
                            <label for="Kode_pos">Kode Pos:</label>
                            <input type="text" class="form-control" name="Kode_pos" id="Kode_pos">
                        </div>
            
                        <div class="form-group">
                            <label for="Tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" name="Tempat_lahir" id="Tempat_lahir">
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" name="Tanggal_lahir" id="Tanggal_lahir">
                        </div>
            
                        <div class="form-group">
                            <label for="Umur">Umur:</label>
                            <input type="text" class="form-control" name="Umur" id="Umur">
                        </div>
            
                        <div class="form-group">
                            <label for="No_KTP">No. KTP:</label>
                            <input type="text" class="form-control" name="No_KTP" id="No_KTP">
                        </div>
            
                        <div class="form-group">
                            <label for="Jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" name="Jenis_kelamin" id="Jenis_kelamin">
                                <?= $jenis_kelamin_options; ?>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="Telepon">Telepon:</label>
                            <input type="text" class="form-control" name="Telepon" id="Telepon">
                        </div>
            
                        <div class="form-group">
                            <label for="Pendidikan">Pendidikan:</label>
                            <input type="text" class="form-control" name="Pendidikan" id="Pendidikan">
                        </div>
            
                        <div class="form-group">
                            <label for="Pekerjaan_Jabatan">Pekerjaan/Jabatan:</label>
                            <input type="text" class="form-control" name="Pekerjaan_Jabatan" id="Pekerjaan_Jabatan">
                        </div>
            
                        <div class="form-group">
                            <label for="Tanggal_masuk">Tanggal Masuk:</label>
                            <input type="date" class="form-control" name="Tanggal_masuk" id="Tanggal_masuk">
                        </div>
            
                        <div class="form-group">
                            <label for="Simpanan_pokok">Simpanan Pokok:</label>
                            <input type="text" class="form-control" name="Simpanan_pokok" id="Simpanan_pokok">
                        </div>
            
                        <div class="form-group">
                            <label for="smk">Simpanan sukarela:</label>
                            <input type="text" class="form-control" name="smk" id="smk">
                        </div>
            
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        <a href="../../home.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
