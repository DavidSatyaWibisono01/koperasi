<?php
    require '../../controller/controller.php';
    $pinjamanAnggota = AngsuranData();

    $totalJumlahAngsuran = 0;
    $sisaJumlahAngsuran = 0;

    foreach ($pinjamanAnggota as $row) {
        $totalJumlahAngsuran += $row['Angsuran_ke'];
        $sisaJumlahAngsuran += $row['Jumlah_angsuran'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Angsuran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Laporan Data Angsuran</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>ID Angsuran</th>
                        <th>ID Pinjaman</th>
                        <th>Nomor Anggota</th>
                        <th>Nama Anggota</th>
                        <th>NIK</th>
                        <th>Tanggal Angsuran</th>
                        <th>Tanggal Bayar</th>
                        <th>Angsuran ke-</th>
                        <th>Jumlah Angsuran</th>
                        <th>Denda</th>
                        <th>Total Bayar</th>
                        <th>Sisa Pinjaman Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pinjamanAnggota as $row): ?>
                        <tr>
                            <td><?= $i ?>.</td>
                            <td><?= $row['ID_angsuran'] ?></td>
                            <td><?= $row['ID_pinjaman'] ?></td>
                            <td><?= $row['No_anggota'] ?></td>
                            <td><?= $row['Nama_anggota'] ?></td>
                            <td><?= $row['NIK'] ?></td>
                            <td><?= $row['Tanggal_angsuran'] ?></td>
                            <td><?= $row['Jumlah_angsuran'] ?></td>
                            <td><?= $row['Tanggal_bayar'] ?></td>
                            <td><?= $row['Angsuran_ke'] ?></td>
                            <td><?= $row['Denda'] ?></td>
                            <td><?= $row['Total_bayar'] ?></td>
                            <td><?= $row['Sisa_pinjaman_akhir'] ?></td>
                            <td class="action-links">
                                <a href='delete.php?id="<?= $row["ID_angsuran"] ?>"' class="delete-link">Hapus</a>
                                <a href="update.php?id=<?= $row["ID_angsuran"] ?>" class="update-link">Ubah</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <p>Total Jumlah Pinjaman: Rp. <?= number_format($sisaJumlahAngsuran, 2); ?></p>
            <p>Total Jumlah Angsuran: <?= number_format($totalJumlahAngsuran); ?>Bulan</p>
        </div>
    </div>
</body>
</html>
