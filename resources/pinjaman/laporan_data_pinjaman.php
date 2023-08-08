<?php
    require '../../controller/controller.php';
    $pinjamanAnggota = pinjamanAnggota();

    $totalJumlahPinjaman = 0;
    $totalJumlahAngsuran = 0;

    foreach ($pinjamanAnggota as $row) {
        $totalJumlahPinjaman += $row['Besar_pinjaman'];
        $totalJumlahAngsuran += $row['Bunga/Bulan'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pinjaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Data Pinjaman</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>ID Pinjaman</th>
                        <th>Nomor Akun Piutang</th>
                        <th>Nama Anggota</th>
                        <th>Besar Pinjaman</th>
                        <th>Jangka Waktu</th>
                        <th>Bunga/Bulan</th>
                        <th>Jumlah Angsuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pinjamanAnggota as $row): ?>
                        <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $row['ID_pinjaman'] ?></td>
                            <td><?= $row['No_akun_piutang'] ?></td>
                            <td><?= $row['Nama_anggota'] ?></td>
                            <td><?= $row['Besar_pinjaman'] ?></td>
                            <td><?= $row['Bunga/Tahun'] ?></td>
                            <td><?= $row['Bunga/Bulan'] ?></td>
                            <td><?= $row['jumlah_angsuran'] ?></td>
                            <td class="action-links">
                                <a href='delete.php?id="<?= $row["ID_pinjaman"] ?>"' class="delete-link">Hapus</a>
                                <a href="update.php?id=<?= $row["ID_pinjaman"] ?>" class="update-link">Ubah</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <p>Total Jumlah Pinjaman: <?= number_format($totalJumlahPinjaman, 2); ?></p>
            <p>Total Jumlah Angsuran: <?= number_format($totalJumlahAngsuran); ?> Bulan</p>
        </div>
    </div>
</body>
</html>
