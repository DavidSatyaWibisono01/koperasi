<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      padding: 20px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
    }

    li a {
      display: block;
      color: #000;
      padding: 8px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #555;
      color: white;
    }
  </style>
</head>
<body>
  <img src="logo.jpg" alt="logo" style="width:300px; height:200px">
  <h1>KUD MEKAR UNGARAN</h1>

  <h2>Menu Utama</h2>
  <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="resources/anggota/form_anggota.php">Form Anggota</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/karyawan/form_karyawan.php">Form Karyawan</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/simpanan/form_transaksi_simpanan.php">Form Transaksi Simpanan</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/pinjaman/form_transaksi_pinjaman.php">Form Transaksi Pinjaman</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/angsuran/form_transaksi_angsuran.php">Form Transaksi Angsuran</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/anggota/laporan_anggota.php">Laporan Anggota</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/karyawan/laporan_data_karyawan.php">Laporan Data Karyawan</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/simpanan/laporan_data_simpanan.php">Laporan Data Simpanan Anggota</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/pinjaman/laporan_data_pinjaman.php">Laporan Data Pinjaman Anggota</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/laporan_data_piutang.php">Laporan Data Piutang</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/laporan_saldo_kas.php">Laporan Saldo Kas</a></li>
    <li class="nav-item"><a class="nav-link" href="resources/angsuran/laporan_data_angsuran.php">Laporan Data Angsuran</a></li>
  </ul>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
