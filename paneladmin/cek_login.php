<?php  
session_start();
require_once '../config/koneksi.php';

// atasi SQL Injexsion
function anti_injek($data) {
	$filter = mysqli_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
	return $filter;
}

if(isset($_COOKIE['id']) && isset($_COOKIE['id'])) {
	// tangkap dulu
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// cari di DB ada gk id user nya ?
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id") or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	// jika key tang sudah di hash cookie sama dengan, di usernam buat sessionnya.
	if($key === hash('sha256', $row['username'])) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
		$_SESSION['passuser'] = $row['password'];
	}
}

// tangkap semua inputan user dan password
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah username ada di dlam DB ?
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
if(mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	if(password_verify($password, $row['password'])) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
		$_SESSION['passuser'] = $row['password'];
			// set cookie
	if(isset($_POST['remember'])) {
		setcookie('id', $row['id_user'], time() + 60);
		setcookie('key', hash('sha256', $row['username']), time() + 60);
	}
		header("Location: media.php?p=home");
			exit;
	}
	echo "<script>alert('Username/Password Kamu Salah!.');window.location='index.php';</script>";
}



// cek
// if($cekuser > 0) {
// 	$_SESSION['username'] = $row['username'];
// 	$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
// 	$_SESSION['passuser'] = $row['password'];

// 	// set cookie
// 	if(isset($_POST['remember'])) {
// 		setcookie('id', $row['id_user'], time() + 60);
// 		setcookie('key', hash('sha256', $row['username']), time() + 60);
// 	}


// 	echo "<script>alert('Selamat Datang $_SESSION[username]');window.location='media.php?p=home';</script>";
// } else {
// 	echo "<script>alert('Usernama/password anda salah!');window.location='index.php';</script>";
// }