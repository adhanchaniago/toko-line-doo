<?php
require_once 'koneksi.php';

function base_url($url = null) {
	$base_url = 'http://localhost/toko-line-doo/';
	if($url != null) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}


function register($data)
{
	global $conn;
	$nama_lengkap = htmlspecialchars($data['nama_lengkap']);
	$username = htmlspecialchars(strtolower(stripslashes($data['username'])));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);
	$email = htmlspecialchars($data['email']);
	$telp = htmlspecialchars($data['telp']);
	$level = htmlspecialchars($data['level']);
	$blokir = htmlspecialchars($data['blokir']);

	// cek apakah username ada di DB
	$cekUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($conn));
	if(mysqli_fetch_assoc($cekUser)) {
		echo "<script>alert('Username sudah terdaftar')</script>";
		return false;
	}

	// cek jika inputan kosong
	if(empty($username && $nama_lengkap && $password && $email && $telp && $level && $blokir)) {
		echo "<script>alert('Pastikan anda sudah mengisi formulir pendaftaran.')</script>";
		return false;
	}

	// cek password
	if($password != $password2) {
		echo "<script>alert('Password anda belum sama.')</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO tb_user (username, password, nama_lengkap, email, no_telp, level, blokir) VALUES ('$username', '$password', '$nama_lengkap', '$email', '$telp', '$level', '$blokir')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);

}