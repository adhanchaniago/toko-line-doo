<?php 
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

$keranjang = @$_SESSION['keranjang'];

// if(!isset($_SESSION['username'])) {
// 	header("Location: " . "paneladmin/index.php");
// 	exit;
// }

$id_pem = $_GET['id'];

// mendapatkan id_pembelian melalui url
$ambil = mysqli_query($conn, "SELECT * FROM tb_pembelian WHERE id_pembelian = '$id_pem'") or die(mysqli_error($conn));
$pecah = mysqli_fetch_assoc($ambil);

// mendapatkan id_user yang sedang login
$id_user_login = $_SESSION['id_user'];
// var_dump($id_user_login);

// mendapatkan id_pembelian
$id_user_beli = $pecah['id_user'];

if($id_user_beli != $id_user_login) {
	header("Location: riwayat.php");
	exit;
}

// jika tombol kirim ditekan
if(isset($_POST['kirim'])) {
	$nama = htmlspecialchars($_POST['nama']);
	$bank = htmlspecialchars($_POST['bank']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$tanggal = date('Y-m-d');

	$fotoBukti = $_FILES['bukti']['name'];
	$tmpBukti = $_FILES['bukti']['tmp_name'];

	$ektensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ektensiGambar = explode('.', $fotoBukti);
	$ektensiGambar = strtolower(end($ektensiGambar));

	// cek apakah sesuai dengan ektensi ?
	if(!in_array($ektensiGambar, $ektensiGambarValid)) {
		echo "<script>alert('Pastikan gambar yang anda upload JPG,JPEG,PNG.')</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;
	move_uploaded_file($tmpBukti, 'images/bukti/' . $namaFileBaru);

	mysqli_query($conn, "INSERT INTO tb_pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$id_pem', '$nama', '$bank', '$jumlah', '$tanggal', '$namaFileBaru') ") or die(mysqli_error($conn));

	// update tb_pembelian di bagian status
	mysqli_query($conn, "UPDATE tb_pembelian SET status_pembelian = 'Bukti Terkirim' WHERE id_pembelian = '$id_pem'") or die(mysqli_error($conn));

	echo "<script>alert('Bukti berhasil di kirim, silahkan konfirmasi melalui pesan di halaman dashboard anda.');window.location='riwayat.php';</script>";

	return $namaFileBaru;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Pembayaran | TokoLineDoo</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link href="paneladmin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>


</head>
<body> 
	<!--header-->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 Chat<span class="live"> Bantuan</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#">Gratis Ongkir <span class="live">Pesanan diatas Rp.500.000</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
				 <div class="down-top">		
						  <select class="in-drop">
							  <option value="English" class="in-of">English</option>
							  <option value="Japanese" class="in-of">Japanese</option>
							  <option value="French" class="in-of">French</option>
							  <option value="German" class="in-of">German</option>
							</select>
					 </div>
					<div class="down-top top-down">
						  <select class="in-drop">
						  
						  <option value="Dollar" class="in-of">Dollar</option>
						  <option value="Yen" class="in-of">Yen</option>
						  <option value="Euro" class="in-of">Euro</option>
							</select>
					 </div>
					 <!---->
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="index.php"><img src="images/logo.png" alt=" " /></a>
					</div>
					<div class="search">
						<input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
						<input type="submit"  value="SEARCH">

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">					
						<!-- <div class="account"><a href="login.html"><span> </span>YOUR ACCOUNT</a></div> -->
						<?php if(isset($_SESSION['username'])) : ?>
							<ul class="login">
								<li><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span>USER</a></li> |
								<li ><a href="<?= base_url('paneladmin/logout.php'); ?>"><i class="fa fa-sign-out"></i> LOGUOT</a></li>
							</ul>
							<?php else : ?>
							<ul class="login">
								<li><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span>MASUK</a></li> |
								<li ><a href="register.php">DAFTAR</a></li>
							</ul>
						<?php endif; ?>
						<!-- <div class="cart"><a href="#"><span> </span>KERANJANG</a></div> -->
						<div class="cart"><a href="<?= base_url('paneladmin/index.php'); ?>"><span> </span></a></div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!---->
	<div class="container"> 
		
		<div class="register">
			<div class="products">
	   		<h5 class="latest-product"><i class="fa fa-shopping-cart"></i> PEMBAYARAN BELANJA <?= $_SESSION['nama_lengkap']; ?></h5>	
	     	  <!-- <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		      -->
	    </div>
			<div class="row">
				<div class="col-md-12">
					<div class="products">
						<pre><?php var_dump($pecah); ?></pre>
						<div class="register-top-grid">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input type="text" name="nama" id="nama" placeholder="Masukan nama pengirim" class="form-control">
								</div>
								<div class="form-group">
									<label for="bank">Bank</label>
									<input type="text" name="bank" id="bank" placeholder="Masukan bank pengirim" class="form-control">
								</div>
								<div class="form-group">
									<label for="jumlah">jumlah</label>
									<input type="text" name="jumlah" id="jumlah" placeholder="Masukan jumlah transfer" class="form-control">
								</div>
								<div class="form-group">
									<label for="bukti">Bukti Pembayaran</label>
									<input type="file" name="bukti" id="bukti" class="form-control-file">
								</div>
								<div class="form-group">
									<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		   <div class="sub-cate">
				<?php include 'menu.php'; ?>     
	</div>
	<!---->
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="latter">
					<h6>NEWS-LETTER</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter email here"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter email here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latter-right">
					<p>FOLLOW US</p>
					<ul class="face-in-to">
						<li><a href="#"><span> </span></a></li>
						<li><a href="#"><span class="facebook-in"> </span></a></li>
						<div class="clearfix"> </div>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>KATEGORI</h6>
					<ul>
						<?php 
						$menu = mysqli_query($conn, "SELECT * FROM tb_kategori") or die(mysqli_error($conn));
						while($row = mysqli_fetch_assoc($menu)) { ?>
						<li><a href="#"><?= $row['nama_kategori']; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h6>FEATURE PROJECTS</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate">
					<h6>BRANDING TERBAIK</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li ><a href="#">Dignissim neque</a></li>
						<li ><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						<li ><a href="#">Urna ac tortor sc</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Urna ac tortor sc</a></li>
						<li ><a href="#">Eget nisi laoreet</a></li>
						<li ><a href="#">Faciisis ornare</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate cate-bottom">
					<h6>ALAMAT KAMI</h6>
					<ul>
						<li>Jl.Pepaya</li>
						<li>Pekanbaru, Riau</li>
						<li>No. 491.</li>
						<li class="phone">PH : 6985792466</li>
						<li class="temp"> <p class="footer-class">Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>