<?php  
session_start();

if(empty($_SESSION['username']) && empty($_SESSION['passuser'])) {



?>
32:35
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Note Found</title>

  <!-- Bootstrap core CSS -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 p404 centered">
        <img src="img/404.png" alt="">
        <h1>Jangan Panik Dulu!!</h1>
        <h3>Halaman yang Anda cari tidak ada.</h3>
        <br>
        <h5 class="mt">Silahkan Login Dulu:</h5>
        <p><a href="../../index.php">Login</a></p>
      </div>
    </div>
  </div>

<?php 
} else {

// koneksi
require_once '../../../config/koneksi.php';

$p = @$_GET['p'];
$act = $_GET['act'];
$id = @$_GET['id'];

if($act === 'hapus') {
	$query = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Berhasil Dihapus.');window.location='../../media.php?p=admin';</script>";
	} else {
		echo "<script>alert('Data Gagal Dihapus.');window.location='media.php?p=admin';</script>";
	}

} else if($_GET['act'] === 'tambah') {
	$username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
  $email = htmlspecialchars($_POST['email']);
  $no_telp = htmlspecialchars($_POST['no_telp']);
  $level = htmlspecialchars($_POST['level']);
  $blokir = htmlspecialchars($_POST['blokir']);

  // cek apakah username ada di DB
  $cekUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
  if(mysqli_fetch_assoc($cekUser)) {
    echo "<script>alert('Username sudah terdaftar');window.location='../../media.php?p=admin';</script>";
    return false;
  }

  // cek apakah konfi passnya sama
  if($password != $password2) {
    echo "<script>alert('Pastikan password sudah sama!');window.location='../../media.php?p=admin';</script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO tb_user (username, password, nama_lengkap, email, no_telp, level, blokir) VALUES ('$username', '$password', '$nama_lengkap', '$email', '$no_telp', '$level', '$blokir')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='../../media.php?p=admin';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan.');window.location='../../media.php?p=admin';</script>";
	}

} else if($_GET['act'] == 'edit') {
	$idk = $_POST['id_user'];
	$username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
  $email = htmlspecialchars($_POST['email']);
  $no_telp = htmlspecialchars($_POST['no_telp']);
  $level = htmlspecialchars($_POST['level']);
  $blokir = htmlspecialchars($_POST['blokir']);

  // cek apakah username ada di DB
  $cekUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
  if(mysqli_fetch_assoc($cekUser)) {
    echo "<script>alert('Username sudah terdaftar');window.location='../../media.php?p=admin';</script>";
    return false;
  }

  // cek apakah konfi passnya sama
  if($password != $password2) {
    echo "<script>alert('Pastikan password sudah sama!');window.location='../../media.php?p=admin';</script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

	$query = "UPDATE tb_user SET username = '$username', password = '$password', nama_lengkap = '$nama_lengkap', email = '$email', no_telp = '$no_telp', level = '$level', blokir = '$blokir' WHERE id_user = $idk";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='../../media.php?p=admin';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');window.location='../../media.php?p=admin';</script>";
	}


 }	

}
?>