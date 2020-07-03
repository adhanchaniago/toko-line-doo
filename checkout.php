<?php 
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

$keranjang = @$_SESSION['keranjang'];

if(!isset($_SESSION['username'])) {
	header("Location: " . "paneladmin/index.php");
	exit;
}

if(empty($keranjang)) {
	echo "<script>alert('Keranjang belanja kosong, silahkan beli beberapa produk.');window.location='index.php';</script>";
}

$queryi = mysqli_query($conn, "SELECT * FROM tb_user") or die(mysqli_error($conn));
$rowS = mysqli_fetch_assoc($queryi);
$_SESSION['id_user'] = $rowS['id_user'];
$_SESSION['no_telp'] = $rowS['no_telp'];
$_SESSION['emaill'] = $rowS['email'];
// var_dump($_SESSION['id_user']);

?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout | TokoLineDoo</title>
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
	   		<h5 class="latest-product"><i class="fa fa-shopping-cart"></i> CHECKOUT BELANJA</h5>	
	     	  <!-- <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		      -->
	    </div>
		<table class="table">
			<thead>
			<tr>
				<th>No</th>
				<th>Barang</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
			</tr>
			</thead>
			<tbody>
			<?php 
			$no = 1;
			$totalbelanja = 0;
			foreach($keranjang as $id_produk => $jumlah) : ?>
			<?php 
			$query_keranjang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = $id_produk") or die(mysqli_error($conn));
			$rowK = mysqli_fetch_assoc($query_keranjang);
			$subtotal = $rowK['hrg_jual'] * $jumlah;
			?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $rowK['nama']; ?></td>
				<td><?= number_format($rowK['hrg_jual']); ?></td>
				<td><?= $jumlah; ?></td>
				<td><?= number_format($subtotal); ?></td>
			</tr>
			<?php $totalbelanja += $subtotal; ?>
			<?php endforeach; ?>
			<div class="col-md-12" style="margin-bottom: 8px;">
				
			</div>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">Total Belanja</td>
					<td>Rp. <?= number_format($totalbelanja); ?></td>
				</tr>
			</tfoot>
		</table>
		<div class="row">
			<div class="col-md-3">
				<form action="" method="post">
				<input type="text" readonly="" value="<?= $_SESSION['nama_lengkap']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" readonly="" value="<?= $_SESSION['emaill']; ?>">
			</div>
			<div class="col-md-3">
				<input type="text" readonly="" value="<?= $_SESSION['no_telp']; ?>">
			</div>
			<div class="col-md-3">
				<select name="id_ongkir" class="form-control">
					<option value="">Pilih Ongkir</option>
					<?php 
					$ongkir = mysqli_query($conn, "SELECT * FROM tb_ongkir");
					while($rowO = mysqli_fetch_assoc($ongkir)) {
					?>
					<option value="<?= $rowO['id_ongkir'] ?>"><?= $rowO['nama_kota'] . " ~ Rp. " . number_format($rowO['tarif']); ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-12">
			<div class="form-group">
				<label>Alamat Pengiriman</label>
				<textarea name="alamat_pengiriman" class="form-control" cols="10" rows="3" placeholder="Masukan alamat lengkap anda..."></textarea>
			</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="margin-top: 10px;">
					<button type="submit" name="checkout" class="btn btn-danger" style="float: right;">Checkout</button>
				</div>
			</div>
		</div>
		</form>

		<!-- Aksi Checkout -->
		<?php 
		if(isset($_POST['checkout'])) {
			// mendapatkan id_user
			$id_user = $_SESSION['id_user'];
			// dapatkan id_ongkir
			$id_ongkir = $_POST['id_ongkir'];
			$tgl_pembelian = date('Y-m-d');
			$alamat_pengiriman = $_POST['alamat_pengiriman'];

			// jika inputan ongkir kosong
			if(empty($id_ongkir)) {
				echo "<script>alert('Pilih tujuan pengiriman')</script>";
				return false;
			}

			// jika inputan alamat kosong
			if(empty($alamat_pengiriman)) {
				echo "<script>alert('Isi alamat lengkap anda terlebih dahulu.')</script>";
				return false;
			}

			$queryOngkir = $conn->query("SELECT * FROM tb_ongkir WHERE id_ongkir = $id_ongkir") or die(mysqli_error($conn));
			$pecahOngkir = $queryOngkir->fetch_assoc();
			$nama_kota = $pecahOngkir['nama_kota'];
			$tarifOngkir = $pecahOngkir['tarif'];

			$total_pembelian = $totalbelanja + $tarifOngkir; 

			// menyimpan data ke table pembelian
			$queryPembelian = $conn->query("INSERT INTO tb_pembelian (id_user, id_ongkir, tgl_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman) VALUES ('$id_user', '$id_ongkir', '$tgl_pembelian', '$total_pembelian', '$nama_kota', '$tarifOngkir', '$alamat_pengiriman')") or die(mysqli_error($conn));

			// mendapatkan id_pembelian barusan
			$id_pembelian_barusan = $conn->insert_id;

			foreach($_SESSION['keranjang'] as $id_produk => $jumlah) {
				// menampilkan barang berdasarkan kd_barang
				$ambil = $conn->query("SELECT * FROM tb_barang WHERE kd_barang = $id_produk") or die(mysqli_error($conn));
				$perbarang = $ambil->fetch_assoc();

				$nama = $perbarang['nama'];
				$harga = $perbarang['hrg_jual'];
				$subharga = $perbarang['hrg_jual'] * $jumlah;

				$conn->query("INSERT INTO tb_pembelian_barang (id_pembelian, kd_barang, jumlah, nama, harga, subharga) VALUES('$id_pembelian_barusan', '$id_produk', '$jumlah', '$nama', '$harga', '$subharga')") or die(mysqli_error($conn));
			}

			// mengkosongkan keranjang belanja, stelah memasukan ke DB
			unset($_SESSION['keranjang']);

			// menampilkan pesan & mengalihkan ke halaman nota.php
			echo "<script>alert('Pembelian Berhasil');window.location='nota.php?id=$id_pembelian_barusan';</script>";

		}

		?>

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


