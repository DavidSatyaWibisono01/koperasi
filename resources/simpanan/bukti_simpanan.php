<?php
    require '../../controller/controller.php';
    $id = $_GET["id"];
    $detailSimpanan = simpananAnggota("SELECT * FROM simpanan WHERE ID_simpanan = $id")[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Simpanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Detail Simpanan</h2>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID Simpanan</th>
                        <td><?= $detailSimpanan['ID_simpanan'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Anggota</th>
                        <td><?= $detailSimpanan['Nama_anggota'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Simpanan</th>
                        <td><?= $detailSimpanan['Keterangan_simpanan'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Simpanan</th>
                        <td><?= $detailSimpanan['Tgl_simpanan'] ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Simpanan</th>
                        <td><?= $detailSimpanan['Penarikan'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
