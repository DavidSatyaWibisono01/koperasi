<?php
    require '../../controller/controller.php';
    $kasData = getKasData();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Data Kas</h2>
        <div class="text-right mt-4">
            <a href="export.php" class="btn btn-success">Export Excel</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No. Akun Kas</th>
                        <th>Keterangan Kas</th>
                        <th>Saldo Kas Simpanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($kasData as $row) {
                        echo "<tr>";
                        echo "<td>".$row['No_akun_kas']."</td>";
                        echo "<td>".$row['Keterangan_kas']."</td>";
                        echo "<td>".$row['Saldo_kas_simpanan']."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
