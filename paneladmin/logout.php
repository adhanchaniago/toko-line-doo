<?php 
session_start();
require_once '../config/koneksi.php';
session_unset();
session_destroy();
$_SESSION = [];

// cookie
setcookie('id', '', time() + 3600);
setcookie('key', '', time() + 3600);

$query = mysqli_query($conn, "SELECT * FROM tb_user") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($query);

$_SESSION['username'] = $row['username'];
echo "<script>alert('$_SESSION[username] Berhasil Logout');window.location='index.php';</script>"; 
// header("Location: index.php");
// exit;


?>