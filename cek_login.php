<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$kata_sandi = $_POST['kata_sandi'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($konek,"select * from tb_pengguna_unit where email='$email' and kata_sandi='$kata_sandi'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

print_r($fetch);
if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:index.php");
}else{
	header("location:login.html.php");
}
?>