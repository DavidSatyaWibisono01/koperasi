<?php
    require '../../controller/controller.php';

    $piutang = getPiutangData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Piutang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Piutang</h2>
        <div class="text-right mt-4">
            <a href="export.php" class="btn btn-success">Export Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No. Akun Piutang</th>
                        <th>Keterangan</th>
                        <th>Saldo Piutang Anggota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($piutang as $row): ?>
                    <tr>
                        <td><?= $row['No_akun_piutang'] ?></td>
                        <td><?= $row['Keterangan'] ?></td>
                        <td><?= $row['Saldo_piutang_anggota'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="../../home.php" class="btn">Keluar</a>
    </div>
</body>
</html>
