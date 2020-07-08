<?php
function editBrg() {
	global $conn;
	$kd_barang = $_POST['kd_barang'];
	$nama = htmlspecialchars($_POST['nama_produk']);
	$id_kategori = htmlspecialchars($_POST['id_kategori']);
	$deskripsi = htmlspecialchars($_POST['deskripsi']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$tgl_masuk = htmlspecialchars($_POST['tgl_masuk']);
	$hrg_jual = htmlspecialchars($_POST['hrg_jual']);
	$terjual = htmlspecialchars($_POST['terjual']);
	$headline = htmlspecialchars($_POST['headline']);
	$stok = htmlspecialchars($_POST['stok']);
	$fotoLama = $_POST['fotoLama'];

	// cek gambar
	// cek gambar
	if($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	} else {
		$foto = upload();
	}

	$query = "UPDATE tb_barang SET
							nama = '$nama',
							id_kategori = '$id_kategori',
							deskripsi = '$deskripsi',
							jumlah_brg = '$jumlah',
							headline = '$headline',
							tgl_masuk = '$tgl_masuk',
							hrg_jual = '$hrg_jual',
							terjual = '$terjual',
							foto = '$foto',
							stok_barang = '$stok'
							WHERE kd_barang = $kd_barang
						";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	// if($error === 4) {
	// 	echo "<script>alert('pilih gambar terlebih dahulu.')</script>";
	// 	return false;
	// }

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

function yn($data) {
	return $data == "Y" ? "Ya" : "Tidak";
}