<?php
require '../../controller/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapusAnggota($id)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'laporan_anggota.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'laporan_anggota.php';
            </script>";
    }
}