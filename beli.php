<?php 
session_start();
$id_barang = $_GET['id'];

// jikasudah ada barang di keranjang, maka produkitu akan tambah +1
if(isset($_SESSION['keranjang'][$id_barang])) {
	$_SESSION['keranjang'][$id_barang] += 1;
} else {
	// jika barang belum ada di halaman keranjang akan di anggap beli 1
	$_SESSION['keranjang'][$id_barang] = 1;
}

if(!isset($_GET['id'])) {
	header("Location: paneladmin/index.php");
	exit;
}


// if(!isset($_SESSION['username'])) {
// 	echo "<script>alert('Silahkan login terlebih dahulu.');window.location='paneladmin/index.php';</script>";
// } else {
// 	echo "<script>alert('Produk telah masuk ke keranjang belanja anda.');window.location='keranjang.php';</script>";
// }

echo "<script>alert('Barang berhasil di tambahkan ke keranjang.');window.location='keranjang.php';</script>";

?>