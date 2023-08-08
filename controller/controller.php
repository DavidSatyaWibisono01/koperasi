<?php
    $conn = mysqli_connect("localhost", "root", "", "koperasi");

    function inputDataAnggota($data) {
        global $conn;

        $No_anggota = $data['No_anggota'];
        $Nama_anggota = $data['Nama_anggota'];
        $Alamat = $data['Alamat'];
        $Kota = $data['Kota'];
        $Kode_pos = $data['Kode_pos'];
        $Tempat_lahir = $data['Tempat_lahir'];
        $Tanggal_lahir = $data['Tanggal_lahir'];
        $Umur = $data['Umur'];
        $No_KTP = $data['No_KTP'];
        $Jenis_kelamin = $data['Jenis_kelamin'];
        $Telepon = $data['Telepon'];
        $Pendidikan = $data['Pendidikan'];
        $Pekerjaan_Jabatan = $data['Pekerjaan_Jabatan'];
        $Tanggal_masuk = $data['Tanggal_masuk'];
        $Simpanan_pokok = $data['Simpanan_pokok'];
        $smk = $data['smk'];

        $query = "INSERT INTO anggota (No_anggota, Nama_anggota, Alamat, Kota, Kode_pos, Tempat_lahir, Tanggal_lahir, Umur, No_KTP, Jenis_kelamin, Telepon, Pendidikan, Pekerjaan_Jabatan, Tanggal_masuk, Simpanan_pokok, smk) 
                VALUES 
                    ('$No_anggota', '$Nama_anggota', '$Alamat', '$Kota', '$Kode_pos', '$Tempat_lahir', '$Tanggal_lahir', '$Umur', '$No_KTP', '$Jenis_kelamin', '$Telepon', '$Pendidikan', '$Pekerjaan_Jabatan', '$Tanggal_masuk', '$Simpanan_pokok', '$smk')
                ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function inputDataKaryawan($data) {
        global $conn;

        $NIK = $data['NIK'];
        $Nama_karyawan = $data['Nama_karyawan'];
        $Alamat = $data['Alamat'];
        $Kota = $data['Kota'];
        $Kode_pos = $data['Kode_pos'];
        $Tempat_lahir = $data['Tempat_lahir'];
        $Tanggal_lahir = $data['Tanggal_lahir'];
        $Umur = $data['Umur'];
        $Status_karyawan = $data['Status_karyawan'];
        $No_telepon = $data['No_telepon'];

        $query = "INSERT INTO karyawan (NIK, Nama_karyawan, Alamat, Kota, Kode_pos, Tempat_lahir, Tanggal_lahir, Umur, Status_karyawan, No_telepon) 
                VALUES 
                    ('$NIK', '$Nama_karyawan', '$Alamat', '$Kota', '$Kode_pos', '$Tempat_lahir', '$Tanggal_lahir', '$Umur', '$Status_karyawan', '$No_telepon')
                ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function generateKeteranganOptions() {
        global $conn;
        $options = "";

        $query = "SELECT * FROM bantu_keterangan";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $options .= "<option value='" . $row['ID'] . "'>" . $row['Keterangan'] . "</option>";
        }

        return $options;
    }

    function sTransaksiSimpanan($data) {
        global $conn;

        $ID_simpanan = $data['ID_simpanan'];
        $No_anggota = $data['No_anggota'];
        $Tgl_simpanan = $data['Tgl_simpanan'];
        $NIK = $data['NIK'];
        $No_akun_kas = $data['No_akun_kas'];
        $Setoran = $data['Setoran'];
        $Penarikan = $data['Penarikan'];
        $Keterangan_simpanan = $data['Keterangan_simpanan'];

        $query = "INSERT INTO simpanan (ID_simpanan, No_anggota, Tgl_simpanan, NIK, No_akun_kas, Setoran, Penarikan, Keterangan_simpanan) 
                VALUES 
                    ('$ID_simpanan', '$No_anggota', '$Tgl_simpanan', '$NIK', '$No_akun_kas', '$Setoran', '$Penarikan', '$Keterangan_simpanan')
                ";

        $result = mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function sTransaksiPinjaman($data) {
        global $conn;

        $ID_pinjaman = $_POST['ID_pinjaman'];
        $No_anggota = $_POST['No_anggota'];
        $NIK = $_POST['NIK'];
        $No_akun_piutang = $_POST['No_akun_piutang'];
        $Tanggal_pengaju = $_POST['Tanggal_pengaju'];
        $Tanggal_otorisasi = $_POST['Tanggal_otorisasi'];
        $Besar_pinjaman = $_POST['Besar_pinjaman'];
        $Jangka_waktu = $_POST['Jangka_waktu'];
        $Angsuran_pokok = $_POST['Angsuran_pokok'];
        $Bunga_per_tahun = $_POST['Bunga_per_tahun'];
        $Bunga_per_bulan = $_POST['Bunga_per_bulan'];
        $jumlah_angsuran = $_POST['jumlah_angsuran'];

        $query = "INSERT INTO pinjaman (ID_pinjaman, No_anggota, NIK, No_akun_piutang, Tanggal_pengaju, Tanggal_otorisasi, Besar_pinjaman, Jangka_waktu, Angsuran_pokok, `Bunga/Tahun`, `Bunga/Bulan`, jumlah_angsuran) 
                VALUES 
                    ('$ID_pinjaman', '$No_anggota', '$NIK', '$No_akun_piutang', '$Tanggal_pengaju', '$Tanggal_otorisasi', '$Besar_pinjaman', '$Jangka_waktu', '$Angsuran_pokok', '$Bunga_per_tahun', '$Bunga_per_bulan', '$jumlah_angsuran')
                ";

        $result = mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function sTransaksiAngsuran($data) {
        global $conn;

        $ID_angsuran = $data['ID_angsuran'];
        $ID_pinjaman = $data['ID_pinjaman'];
        $No_anggota = $data['No_anggota'];
        $Nama_anggota = $data['Nama_anggota'];
        $NIK = $data['NIK'];
        $Tanggal_angsuran = $data['Tanggal_angsuran'];
        $Tanggal_bayar = $data['Tanggal_bayar'];
        $Angsuran_ke = $data['Angsuran_ke'];
        $Jumlah_angsuran = $data['Jumlah_angsuran'];
        $Denda = $data['Denda'];
        $Total_bayar = $data['Total_bayar'];
        $Sisa_pinjaman_akhir = $data['Sisa_pinjaman_akhir'];

        $query = "INSERT INTO angsuran (ID_angsuran, ID_pinjaman, No_anggota, Nama_anggota, NIK, Tanggal_angsuran, Tanggal_bayar, Angsuran_ke, Jumlah_angsuran, Denda, Total_bayar, Sisa_pinjaman_akhir) 
                VALUES 
                    ('$ID_angsuran', '$ID_pinjaman', '$No_anggota', '$Nama_anggota', '$NIK', '$Tanggal_angsuran', '$Tanggal_bayar', '$Angsuran_ke', '$Jumlah_angsuran', '$Denda', '$Total_bayar', '$Sisa_pinjaman_akhir')
                ";

        $result = mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function tampilData($query) {
        global $conn;
        
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query error: " . mysqli_error($conn));
        }
        
        $kotak = [];
        while ($box = mysqli_fetch_assoc($result)) {
            $kotak[] = $box;
        }
        return $kotak;
    }
    

    function pinjamanAnggota() {
        $host = 'localhost';
        $db   = 'koperasi';
        $user = 'root';
        $pass = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $query = "SELECT p.ID_pinjaman, p.No_anggota, p.NIK, p.No_akun_piutang, p.Tanggal_pengaju, p.Tanggal_otorisasi, p.Besar_pinjaman, p.Jangka_waktu, p.Angsuran_pokok, p.`Bunga/Tahun`, p.`Bunga/Bulan`, p.jumlah_angsuran, a.Nama_anggota, k.Nama_karyawan
                    FROM pinjaman p
                    LEFT JOIN anggota a ON p.No_anggota = a.No_anggota
                    LEFT JOIN karyawan k ON p.NIK = k.NIK
                    ORDER BY p.ID_pinjaman DESC";
    
            $pinjaman = tampilData($query);
    
            return $pinjaman;
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function simpananAnggota() {
        $host = 'localhost';
        $db   = 'koperasi';
        $user = 'root';
        $pass = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT s.ID_simpanan, s.No_anggota, a.Nama_anggota, s.Tgl_simpanan, s.Keterangan_simpanan, s.Penarikan
                    FROM simpanan s
                    LEFT JOIN anggota a ON s.No_anggota = a.No_anggota
                    ORDER BY s.ID_simpanan DESC
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $simpananAnggota = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pdo = null;

            return $simpananAnggota;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    function AngsuranData() {
        $host = 'localhost';
        $db   = 'koperasi';
        $user = 'root';
        $pass = '';

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT a.ID_angsuran, a.ID_pinjaman, a.No_anggota, a.Nama_anggota, a.NIK, a.Tanggal_angsuran, a.Tanggal_bayar, a.Angsuran_ke, a.Jumlah_angsuran, a.Denda, a.Total_bayar, a.Sisa_pinjaman_akhir
                    FROM angsuran a
                    LEFT JOIN pinjaman p ON a.ID_pinjaman = p.ID_pinjaman";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $angsuran = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $angsuran;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    function updateAnggota($data) {
        global $conn;

        $No_anggota = $data['No_anggota'];
        $Nama_anggota = $data['Nama_anggota'];
        $Alamat = $data['Alamat'];
        $Kota = $data['Kota'];
        $Kode_pos = $data['Kode_pos'];
        $Tempat_lahir = $data['Tempat_lahir'];
        $Tanggal_lahir = $data['Tanggal_lahir'];
        $Umur = $data['Umur'];
        $No_KTP = $data['No_KTP'];
        $Jenis_kelamin = $data['Jenis_kelamin'];
        $Telepon = $data['Telepon'];
        $Pendidikan = $data['Pendidikan'];
        $Pekerjaan_Jabatan = $data['Pekerjaan_Jabatan'];
        $Tanggal_masuk = $data['Tanggal_masuk'];
        $Simpanan_pokok = $data['Simpanan_pokok'];
        $smk = $data['smk'];

        $query = "UPDATE anggota SET 
                    Nama_anggota = '$Nama_anggota',
                    Alamat = '$Alamat',
                    Kota = '$Kota',
                    Kode_pos = '$Kode_pos',
                    Tempat_lahir = '$Tempat_lahir',
                    Tanggal_lahir = '$Tanggal_lahir',
                    Umur = '$Umur',
                    No_KTP = '$No_KTP',
                    Jenis_kelamin = '$Jenis_kelamin',
                    Telepon = '$Telepon',
                    Pendidikan = '$Pendidikan',
                    Pekerjaan_Jabatan = '$Pekerjaan_Jabatan',
                    Tanggal_masuk = '$Tanggal_masuk',
                    Simpanan_pokok = '$Simpanan_pokok',
                    smk = '$smk'
                WHERE No_anggota = $No_anggota
        ";
        echo $query;
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Kesalahan query: ' . mysqli_error($conn));
        }
        return mysqli_affected_rows($conn);
    }

    function hapusAnggota($id) {
        global $conn;
    
        $query = "DELETE FROM anggota WHERE No_anggota = '$id'";
        $result = mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }
    
    function updateAngsuran($data) {
        global $conn;

        $ID_angsuran = $data['ID_angsuran'];
        $ID_pinjaman = $data['ID_pinjaman'];
        $No_anggota = $data['No_anggota'];
        $Nama_anggota = $data['Nama_anggota'];
        $NIK = $data['NIK'];
        $Tanggal_angsuran = $data['Tanggal_angsuran'];
        $Tanggal_bayar = $data['Tanggal_bayar'];
        $Angsuran_ke = $data['Angsuran_ke'];
        $Jumlah_angsuran = $data['Jumlah_angsuran'];
        $Denda = $data['Denda'];
        $Total_bayar = $data['Total_bayar'];
        $Sisa_pinjaman_akhir = $data['Sisa_pinjaman_akhir'];

        $query = "UPDATE angsuran SET
                    ID_pinjaman = '$ID_pinjaman', 
                    No_anggota = '$No_anggota', 
                    Nama_anggota = '$Nama_anggota', 
                    NIK = '$NIK', 
                    Tanggal_angsuran = '$Tanggal_angsuran', 
                    Tanggal_bayar = '$Tanggal_bayar', 
                    Angsuran_ke = '$Angsuran_ke', 
                    Jumlah_angsuran = '$Jumlah_angsuran', 
                    Denda = '$Denda', 
                    Total_bayar = '$Total_bayar', 
                    Sisa_pinjaman_akhir = '$Sisa_pinjaman_akhir'
                WHERE ID_angsuran = '$ID_angsuran'";


        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function updateKaryawan($data) {
        global $conn;

        $NIK = $data['NIK'];
        $Nama_karyawan = $data['Nama_karyawan'];
        $Alamat = $data['Alamat'];
        $Kota = $data['Kota'];
        $Kode_pos = $data['Kode_pos'];
        $Tempat_lahir = $data['Tempat_lahir'];
        $Tanggal_lahir = $data['Tanggal_lahir'];
        $Umur = $data['Umur'];
        $Status_karyawan = $data['Status_karyawan'];
        $No_telepon = $data['No_telepon'];

        $query = "UPDATE karyawan SET
                    Nama_karyawan = '$Nama_karyawan',
                    Alamat = '$Alamat',
                    Kota = '$Kota',
                    Kode_pos = '$Kode_pos',
                    Tempat_lahir = '$Tempat_lahir',
                    Tanggal_lahir = '$Tanggal_lahir',
                    Umur = '$Umur',
                    Status_karyawan = '$Status_karyawan',
                    No_telepon = '$No_telepon'
                WHERE NIK = '$NIK'
        ";

        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function updatePinjaman($data) {
        global $conn;

        $ID_pinjaman = $_POST['ID_pinjaman'];
        $No_anggota = $_POST['No_anggota'];
        $NIK = $_POST['NIK'];
        $No_akun_piutang = $_POST['No_akun_piutang'];
        $Tanggal_pengaju = $_POST['Tanggal_pengaju'];
        $Tanggal_otorisasi = $_POST['Tanggal_otorisasi'];
        $Besar_pinjaman = $_POST['Besar_pinjaman'];
        $Jangka_waktu = $_POST['Jangka_waktu'];
        $Angsuran_pokok = $_POST['Angsuran_pokok'];
        $Bunga_Tahun = $_POST['Bunga/Tahun'];
        $Bunga_Bulan = $_POST['Bunga/Bulan'];
        $jumlah_angsuran = $_POST['jumlah_angsuran'];

        $query = "UPDATE pinjaman SET 
                    No_anggota = '$No_anggota',
                    NIK = '$NIK',
                    No_akun_piutang = '$No_akun_piutang',
                    Tanggal_pengaju = '$Tanggal_pengaju',
                    Tanggal_otorisasi = '$Tanggal_otorisasi',
                    Besar_pinjaman = '$Besar_pinjaman',
                    Jangka_waktu = '$Jangka_waktu',
                    Angsuran_pokok = '$Angsuran_pokok',
                    Bunga/Tahun = '$Bunga_Tahun',
                    Bunga/Bulan = '$Bunga_Bulan',
                    jumlah_angsuran = '$jumlah_angsuran'
                WHERE ID_pinjaman = '$ID_pinjaman'";

        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function updateSimpanan($data) {
        global $conn;

        $ID_simpanan = $_POST['ID_simpanan'];
        $No_anggota = $_POST['No_anggota'];
        $Tgl_simpanan = $_POST['Tgl_simpanan'];
        $NIK = $_POST['NIK'];
        $No_akun_kas = $_POST['No_akun_kas'];
        $Setoran = $_POST['Setoran'];
        $Penarikan = $_POST['Penarikan'];
        $Keterangan_simpanan = $_POST['Keterangan_simpanan'];

        $query = "UPDATE simpanan SET 
                    No_anggota = '$No_anggota',
                    Tgl_simpanan = '$Tgl_simpanan',
                    NIK = '$NIK',
                    No_akun_kas = '$No_akun_kas',
                    Setoran = '$Setoran',
                    Penarikan = '$Penarikan',
                    Keterangan_simpanan = '$Keterangan_simpanan'
                WHERE ID_simpanan = '$ID_simpanan'
        ";
                
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function getPiutangData() {
        $host = 'localhost';
        $db   = 'koperasi';
        $user = 'root';
        $pass = '';
    
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "SELECT No_akun_piutang, Keterangan, Saldo_piutang_anggota FROM piutang";
    
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $piutang = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $piutang;
    
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

?>