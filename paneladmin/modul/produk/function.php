<?php
function upload() {
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	$ektensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ektensiGambar = explode('.', $namaFile);
	$ektensiGambar = strtolower(end($ektensiGambar));

	// cek apakah gambar yang diupload
	if(!in_array($ektensiGambar, $ektensiGambarValid)) {
		echo "<script>alert('yang anda upload bukan gambar.')</script>";
		return false;
	}

	if($ukuranFile > 1000000) {
		echo "<script>alert('ukuran gambar terlalu besar.')</script>";
		return false;
	}

	// generate nama gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;

	// replace gambar
	$gambarLama = $_POST["fotoLama"];
	$path = "img/" . $gambarLama;
	if(file_exists($path)) {
		unlink($path);
	}

	move_uploaded_file($tmpName, "img/" . $namaFileBaru);
	return $namaFileBaru;
}