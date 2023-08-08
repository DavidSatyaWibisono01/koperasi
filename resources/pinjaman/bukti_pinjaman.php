<?php
    require '../../controller/controller.php';
    $ID_pinjaman = $_GET["ID_pinjaman"];
    $detailSimpanan = pinjamanAnggota("SELECT * FROM pinjaman WHERE ID_pinjaman = $ID_pinjaman")[0];
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
                        <th>ID Pinjaman</th>
                        <td><?= var_dump($detailSimpanan['ID_pinjaman']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
