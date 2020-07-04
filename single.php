<?php 
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

$id = $_GET['id'];
$gambarZoom = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = $id") or die(mysqli_error($conn));
$gbrZ = mysqli_fetch_assoc($gambarZoom);

// ketika tombol beli di klik
if(isset($_POST['beli'])) {
	$jumlah = $_POST['jumlah'];

	$_SESSION['keranjang'][$id] = $jumlah;

	echo "<script>alert('Produk berhasil masuk ke keranjang belanja anda.');window.location='keranjang.php';</script>";
}
 

?>
<!DOCTYPE html>
<html>
<head>
<title><?= $gbrZ['nama']; ?> | TokoLineDoo</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<link rel="stylesheet" href="css/etalage.css" type="text/css" media="all" />
<link href="paneladmin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>

<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>

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
						<a href="<?= base_url(); ?>"><img src="images/logo.png" alt=" " /></a>
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
								<li ><a href="<?= base_url('paneladmin/index.php'); ?>">DAFTAR</a></li>
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
	 	
	 	<div class=" single_top">
	      <div class="single_grid">
				<div class="grid images_3_of_2">
					
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="paneladmin/modul/produk/img/<?= $gbrZ['foto']; ?>" class="img-responsive" />
									<img class="etalage_source_image" src="paneladmin/modul/produk/img/<?= $gbrZ['foto']; ?>" class="img-responsive" title="" />
								</a>
							</li>
						</ul>
						 <div class="clearfix"> </div>		
				  </div> 
				  <div class="desc1 span_3_of_2">
				  
					
					<h4><?= $gbrZ['nama']; ?></h4>
				<div class="cart-b">
					<div class="left-n ">Rp. <?= $gbrZ['hrg_jual']; ?></div>
				    <a class="now-get get-cart-in" href="beli.php?id=<?= $gbrZ['kd_barang']; ?>">Masukan Di Keranjang</a> 
				    <div class="clearfix"></div>
				 </div>

				 </form>
				 <h6><?= $gbrZ['jumlah']; ?> Stok</h6>
				 <form action="" method="post">
				 	<div class="input-group col-md-4">
			      <input type="number" name="jumlah" class="form-control">
			      <span class="input-group-btn">
			        <button type="submit" name="beli" class="btn btn-primary" type="button">Beli</button>
			      </span>
			    </div><!-- /input-group -->
			   	<p><?= $gbrZ['deskripsi']; ?>.</p>
			   	<div class="share">
							<h5>Share Product :</h5>
							<ul class="share_nav">
								<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
								<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
								<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
								<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
				    		</ul>
						</div>
			   
				
				</div>
          	    <div class="clearfix"> </div>
          	   </div>
      <ul id="flexiselDemo1">
      <?php 
      // ambil url dari content.php
      $idk = $_GET['rl'];
      // $relate = mysqli_query($conn, "SELECT * FROM tb_barang INNER JOIN tb_kategori ON tb_barang.kd_barang = tb_kategori.id_kategori") or die(mysqli_error($conn));
      $relate = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_kategori = $idk") or die(mysqli_error($conn));
      while($rRow = mysqli_fetch_assoc($relate)) { ?>
      <!-- <?php if($rRow['id_kategori'] == $rRow['id_kategori']) : ?> -->
			<li><img src="paneladmin/modul/produk/img/<?= $rRow['foto']; ?>"><div class="grid-flex"><a href="single.php?id=<?= $rRow['kd_barang']; ?>&rl=<?= $rRow['id_kategori']; ?>"><?= $rRow['nama']; ?></a><p>Rp <?= number_format($rRow['hrg_jual']); ?></p></div></li>
			<!-- <?php endif; ?> -->
			<?php } ?>
			<!-- 
			<li><img src="images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
			<li><img src="images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
			<li><img src="images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
			<li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li> -->
		 </ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>

          	    	<div class="toogle">
				     	<h3 class="m_3">Product Details</h3>
				     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
				     </div>	
          	   </div>
          	   
          	   <!---->
<div class="sub-cate">
				<?php require_once 'menu.php'; ?>		
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
						<li><a href="product.php?id=<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></a></li>
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