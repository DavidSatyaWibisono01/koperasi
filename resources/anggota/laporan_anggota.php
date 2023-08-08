<?php
    require '../../controller/controller.php';
    $anggotas = tampilData("SELECT * FROM anggota ORDER BY No_anggota DESC");
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
                        <a href="form_anggota.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No. KTP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Pendidikan</th>
                                    <th>Pekerjaan/Jabatan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Simpanan Pokok</th>
                                    <th>SMK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($anggotas as $anggota) { ?>
                                    <tr>
                                        <td><?= $i ?>.</td>
                                        <td><?= $anggota["No_anggota"] ?></td>
                                        <td><?= $anggota["Nama_anggota"] ?></td>
                                        <td><?= $anggota["Alamat"] ?></td>
                                        <td><?= $anggota["Kota"] ?></td>
                                        <td><?= $anggota["Tanggal_lahir"] ?></td>
                                        <td><?= $anggota["No_KTP"] ?></td>
                                        <td><?= $anggota["Jenis_kelamin"] ?></td>
                                        <td><?= $anggota["Telepon"] ?></td>
                                        <td><?= $anggota["Pendidikan"] ?></td>
                                        <td><?= $anggota["Pekerjaan_Jabatan"] ?></td>
                                        <td><?= $anggota["Tanggal_masuk"] ?></td>
                                        <td><?= $anggota["Simpanan_pokok"] ?></td>
                                        <td><?= $anggota["smk"] ?></td>
                                        <td class="action-links">
                                            <a href='delete.php?id="<?= $anggota["No_anggota"] ?>"' class="delete-link">Hapus</a>
                                            <a href="update.php?id=<?= $anggota["No_anggota"] ?>" class="update-link">Ubah</a>
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
