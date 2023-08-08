<?php
    require '../../controller/controller.php';

    if( isset($_POST["submit"]) ){
            
        if( inputDataKaryawan($_POST) > 0 ){
            echo "
                <script>
                    alert('Data Karyawan Berhasil Ditambahkan!');
                    document.location.href = '../../home.php';
                </script>
                ";
        }else{
            echo "
                <script>
                    alert('Data Karyawan Gagal Ditambahkan');
                    document.location.href = '../../home.php';
                </script>
                ";
        }
    }

    $query = "SELECT * FROM status_karyawan";
    $result = mysqli_query($conn, $query);
    $statusOptions = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $statusOptions .= "<option value='" . $row['ID'] . "'>" . $row['Status_karyawan'] . "</option>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Data Karyawan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <h2>Form Data Karyawan</h2>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="NIK">NIK:</label>
                            <input type="text" class="form-control" name="NIK" id="NIK" required>
                        </div>
            
                        <div class="form-group">
                            <label for="Nama_karyawan">Nama Karyawan:</label>
                            <input type="text" class="form-control" name="Nama_karyawan" id="Nama_karyawan">
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
                            <label for="Status_karyawan">Status Karyawan:</label>
                            <select class="form-control" name="Status_karyawan" id="Status_karyawan">
                                <?= $statusOptions; ?>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="No_telepon">No. Telepon:</label>
                            <input type="text" class="form-control" name="No_telepon" id="No_telepon">
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
