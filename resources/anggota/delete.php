<?php
    require 'controller/controller.php';

    if (isset($_GET['no_anggota'])) {
        $noAnggota = $_GET['no_anggota'];
        deleteAnggota($noAnggota);
        header("Location: laporan_anggota.php");
        exit();
    }
?>
