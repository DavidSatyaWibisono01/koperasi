<?php 
// // mengaktifkan session php
// session_start();
 
// // menghubungkan dengan koneksi
// $koneksi = mysqli_connect("localhost","root","","koperasi");
 
// // Check connection
// if (mysqli_connect_errno()){
// 	echo "Koneksi database gagal : " . mysqli_connect_error();
// }
 
// // menangkap data yang dikirim dari form
// $username = $_POST['username'];
// $password = $_POST['password'];
 
// // menyeleksi data admin dengan username dan password yang sesuai
// $data = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' and password='$password'");
 
// // menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($data);
 
// if($cek > 0){
// 	$_SESSION['username'] = $username;
// 	$_SESSION['status'] = "login";
// 	header("location:home.php");
// }else{
// 	header("location:index.php?pesan=gagal");
// }
?>