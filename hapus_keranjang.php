<?php 
session_start();
$id_barang = $_GET['id'];
unset($_SESSION['keranjang'][$id_barang]);

echo "<script>alert('Barang Berhasil Dihapus.');window.location='keranjang.php';</script>";

?>