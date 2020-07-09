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
	$brgH = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = $id") or die(mysqli_error($conn));
	$rowH = mysqli_fetch_assoc($brgH);
	$f = $rowH['foto'];
	if(file_exists('img/' . $f)) {
		unlink('img/' . $f);
	}
	
	$query = mysqli_query($conn, "DELETE FROM tb_barang WHERE kd_barang = $id") or die(mysqli_error($conn));
	if($query) {
		echo "<script>alert('Data Berhasil Dihapus.');window.location='../../media.php?p=produk';</script>";
	} else {
		echo "<script>alert('Data Gagal Dihapus.');window.location='media.php?p=produk';</script>";
	}

} else if($_GET['act'] === 'tambah') {
	$nama = htmlspecialchars($_POST['nama_produk']);
	$id_kategori = htmlspecialchars($_POST['id_kategori']);
	$deskripsi = htmlspecialchars($_POST['deskripsi']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
	$hrg_jual = htmlspecialchars($_POST['hrg_jual']);
	$terjual = htmlspecialchars($_POST['terjual']);
	$headline = htmlspecialchars($_POST['headline']);
	$stok = htmlspecialchars($_POST['stok']);

	// cek gambar
	$namaFotoAll = $_FILES['foto']['name'];
	$tmpFotoAll = $_FILES['foto']['tmp_name'];

	move_uploaded_file($tmpFotoAll[0], 'img/' . $namaFotoAll[0]);

	mysqli_query($conn, "INSERT INTO tb_barang (nama, id_kategori, deskripsi, jumlah_brg, headline,  tgl_masuk, hrg_jual, terjual, foto, stok_barang) VALUES ('$nama', '$id_kategori', '$deskripsi', '$jumlah', '$headline', '$tgl_masuk', '$hrg_jual', '$terjual', '$namaFotoAll[0]', '$stok')") or die(mysqli_error($conn));

	// mendapatkan id barusan
	$id_barang = mysqli_insert_id($conn);

	foreach($namaFotoAll as $key => $tiapNama) {
		$lokasiFoto = $tmpFotoAll[$key];

		// jika nama foto sama, yg upload ke tb_brang sama dengan tb_produk_foto, acak namanya.
		if($namaFotoAll == $tiapNama) {
			rand(00000000, 99999999);
		}

		move_uploaded_file($lokasiFoto, 'img/'. $tiapNama);

		mysqli_query($conn, "INSERT INTO tb_produk_foto (kd_barang, nama_produk_foto) VALUES ('$id_barang', '$tiapNama')") or die(mysqli_error($conn));
	}

	echo "<script>alert('Data Berhasil Ditambahkan.');window.location='../../media.php?p=produk';</script>";

	// echo "<pre>";
	// var_dump($_FILES['foto']);
	// echo "</pre>";

	// $namaFotoValid = ['jpg','jpeg','png'];
	// $ektensiGambar = explode('.', $namaFoto);
	// $ektensiGambar = strtolower(end($ektensiGambar));
	// if(!in_array($ektensiGambar, $namaFotoValid)) {
	// 	echo "<script>alert('Yang anda upload bukan gambar!')</script>";
	// 	return false;
	// }

	// $namaFileBaru = uniqid();
	// $namaFileBaru .= '.';
	// $namaFileBaru .= $ektensiGambar;

	// move_uploaded_file($tmpFoto, 'img/' . $namaFileBaru);

	// $query = "INSERT INTO tb_barang (nama, id_kategori, deskripsi, jumlah, headline,  tgl_masuk, hrg_jual, terjual, foto) VALUES ('$nama', '$id_kategori', '$deskripsi', '$jumlah', '$headline', '$tgl_masuk', '$hrg_jual', '$terjual', '$namaFileBaru')";
	// mysqli_query($conn, $query) or die(mysqli_error($conn));
	// if($query) {
	// 	echo "<script>alert('Data Berhasil Ditambahkan.');window.location='../../media.php?p=produk';</script>";
	// } else {
	// 	echo "<script>alert('Data Gagal Ditambahkan.');window.location='../../media.php?p=produk';</script>";
	// }
	// return $namaFileBaru;

} else if($_GET['act'] == 'edit') {
	require_once 'function.php';
		if(editBrg() > 0) {
			echo "<script>alert('Data Berhasil Diubah.');window.location='../../media.php?p=produk';</script>";
		} else {
			echo "<script>alert('Data Gagal Diubah.');window.location='../../media.php?p=produk';</script>";
		}

	// $kd_barang = $_POST['kd_barang'];
	// $nama = htmlspecialchars($_POST['nama_produk']);
	// $id_kategori = htmlspecialchars($_POST['id_kategori']);
	// $deskripsi = htmlspecialchars($_POST['deskripsi']);
	// $jumlah = htmlspecialchars($_POST['jumlah']);
	// $tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
	// $hrg_jual = htmlspecialchars($_POST['hrg_jual']);
	// $fotoLama = $_POST['fotoLama'];

	// cek gambar
	// cek gambar
	// if($_FILES['foto']['error'] === 4) {
	// 	$foto = $fotoLama;
	// } else {
	// 	$foto = upload();
	// }

	// $query = "UPDATE tb_barang SET
	// 						nama = '$nama',
	// 						id_kategori = '$id_kategori',
	// 						deskripsi = '$deskripsi',
	// 						jumlah = '$jumlah',
	// 						tgl_masuk = '$tgl_masuk',
	// 						hrg_jual = '$hrg_jual',
	// 						foto = '$foto'
	// 						WHERE kd_barang = $kd_barang
	// 					";
	// mysqli_query($conn, $query) or die(mysqli_error($conn));
	// if($query) {
	// 	echo "<script>alert('Data Berhasil Diubah.');window.location='../../media.php?p=produk';</script>";
	// } else {
	// 	echo "<script>alert('Data Gagal Diubah.');window.location='../../media.php?p=produk';</script>";
	// }
	// return mysqli_affected_rows($conn);


 } else if($_GET['act'] == 'hapusfotoproduk') {
 	$id_produk = $_GET['idproduk'];
 	$id_foto = $_GET['idfoto'];

 	$ambilFoto = mysqli_query($conn, "SELECT * FROM tb_produk_foto WHERE kd_barang = $id_produk") or die(mysqli_error($conn));
 	$pecahFoto = mysqli_fetch_assoc($ambilFoto);
 	$singleFoto = $pecahFoto['nama_produk_foto'];
 	if(file_exists('img/' . $singleFoto)) {
 		unlink('img/' . $singleFoto);
 	}

 	mysqli_query($conn, "DELETE FROM tb_produk_foto WHERE id_produk_foto = $id_foto") or die(mysqli_error($conn));
 	// echo "<script>alert('Foto Berhasil Dihapus.');window.location='media.php?p=produk&aksi=detail&id=$id_produk';</script>";
 	echo "<script>alert('Data Berhasil Diubah.');window.location='../../media.php?p=produk&aksi=detail&id=$id_produk';</script>";

 }

}
?>