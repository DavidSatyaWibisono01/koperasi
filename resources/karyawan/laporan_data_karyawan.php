<?php
    require '../../controller/controller.php';
    $anggotas = tampilData("SELECT * FROM karyawan ORDER BY NIK DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 70rem;">
                <div class="card-body"> 
                    <h2 class="mb-4">Laporan Data Anggota Koperasi</h2>
                    <div class="text-right mt-4">
                        <a href="export.php" class="btn btn-success">Export Excel</a>
                        <a href="form_karyawan.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Kode Pos</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Status Karyawan</th>
                                    <th>No. Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($anggotas as $anggota) { ?>
                                    <tr>
                                        <td><?= $i ?>.</td>
                                        <td><?= $anggota["NIK"] ?></td>
                                        <td><?= $anggota["Nama_karyawan"] ?></td>
                                        <td><?= $anggota["Alamat"] ?></td>
                                        <td><?= $anggota["Kota"] ?></td>
                                        <td><?= $anggota["Kode_pos"] ?></td>
                                        <td><?= $anggota["Tempat_lahir"] ?></td>
                                        <td><?= $anggota["Tanggal_lahir"] ?></td>
                                        <td><?= $anggota["Umur"] ?></td>
                                        <td><?= $anggota["Status_karyawan"] ?></td>
                                        <td><?= $anggota["No_telepon"] ?></td>
                                        <td class="action-links">
                                            <a href='delete.php?id="<?= $anggota["NIK"] ?>"' class="delete-link">Hapus</a>
                                            <a href="update.php?id=<?= $anggota["NIK"] ?>" class="update-link">Ubah</a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="../../home.php" class="btn">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
