<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* CSS tambahan untuk mempercantik tampilan */
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pesan-error {
            color: #dc3545;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php 
        // Kode PHP tetap sama seperti sebelumnya
        ?>

        <!-- Tampilan dengan Bootstrap -->
        <h2>LOGIN</h2>
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<p class='pesan-error'>Login gagal! username dan password salah!</p>";
            }else if($_GET['pesan'] == "logout"){
                echo "<p class='pesan-error'>Anda telah berhasil logout</p>";
            }else if($_GET['pesan'] == "belum_login"){
                echo "<p class='pesan-error'>Anda harus login untuk mengakses halaman admin</p>";
            }
        }
        ?>
        <form method="post" action="cek_login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="LOGIN">
            </div>
        </form>
    </div>
</body>
</html>
