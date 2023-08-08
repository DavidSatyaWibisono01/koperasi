<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Kas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* CSS tambahan untuk mempercantik tampilan */
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Kode PHP tetap sama seperti sebelumnya
        ?>

        <!-- Tampilan dengan Bootstrap -->
        <h2 class="mb-4">Laporan Data Kas</h2>
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
// Melakukan koneksi ke database (ganti sesuai dengan konfigurasi database Anda)
$host = 'localhost';
$db   = 'koperasi';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mendapatkan data kas
    $sql = "SELECT No_akun_kas, Keterangan_kas, Saldo_kas_simpanan FROM kas";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $kas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($kas as $row) {
        echo "<tr>";
        echo "<td>".$row['No_akun_kas']."</td>";
        echo "<td>".$row['Keterangan_kas']."</td>";
        echo "<td>".$row['Saldo_kas_simpanan']."</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Menutup koneksi database
$pdo = null;
?>

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
