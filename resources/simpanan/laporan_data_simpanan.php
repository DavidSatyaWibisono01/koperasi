<?php
    require '../../controller/controller.php';
    $simpananAnggota = simpananAnggota();

    $totalJumlahSimpanan = 0;

    foreach ($simpananAnggota as $row) {
        $totalJumlahSimpanan += $row['Penarikan'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Simpanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Data Simpanan</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Simpanan</th>
                        <th>Nomor Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Jenis Simpanan</th>
                        <th>Jumlah Simpanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($simpananAnggota as $row): ?>
                    <tr>
                        <td><?= $i ?>.</td>
                        <td><?= $row['Tgl_simpanan'] ?></td>
                        <td><?= $row['ID_simpanan'] ?></td>
                        <td><?= $row['Nama_anggota'] ?></td>
                        <td><?= $row['Keterangan_simpanan'] ?></td>
                        <td><?= $row['Penarikan'] ?></td>
                        <td class="action-links">
                            <a href='delete.php?id="<?= $row["ID_simpanan"] ?>"' class="delete-link">Hapus</a>
                            <a href="update.php?id=<?= $row["ID_simpanan"] ?>" class="update-link">Ubah</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <p>Total Jumlah Simpanan: <?= number_format($totalJumlahSimpanan, 2); ?></p>
        </div>
    </div>
</body>
</html>
