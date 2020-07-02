<?php 
$slideSingle = mysqli_query($conn, "SELECT * FROM tb_barang");
$sldS = mysqli_fetch_assoc($slideSingle);
?>
<a href="#">
			<div class="wrap-in">
				
				<div class="wmuSlider example1 slide-grid">		 
				   <div class="wmuSliderWrapper">		  
				<?php 
				$sliderBrg = mysqli_query($conn, "SELECT * FROM tb_barang WHERE headline = 'Y'") or die(mysqli_error($conn));
				while($rowS = mysqli_fetch_assoc($sliderBrg)) { ?>
					   <article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img class="img-responsive " src="paneladmin/modul/produk/img/<?= $rowS['foto']; ?>" alt=" " />
							</div>
							<div class="col-md-7 banner-off">							
								<a href="single.php?id=<?= $rowS['kd_barang']; ?>&rl=<?= $rowS['id_kategori']; ?>"><h2><?= $rowS['nama']; ?></h2></a>
								<label>Cuma <b>Rp. <?= number_format($rowS['hrg_jual'],2,",","."); ?></b></label>
								<!-- funsi untuk menampilkan deskripsi mau berapa kata -->
								<?php 
									$kalimat = $rowS['deskripsi'];
									$jmlKata = 100;
									$tampil = substr($kalimat, 0, $jmlKata);
								?>
								<p><?= $tampil . "<b> Lanjut Baca...</b>";  ?></p>					
								<a href="beli.php?id=<?= $rowS['kd_barang']; ?>"><span class="on-get">BELI SEKARANG</span></a>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
					 	<?php } ?>
					 	
						
					 </div>

					 </a>

	                <ul class="wmuSliderPagination">
	                	<li><a href="#" class="">0</a></li>
	                	<li><a href="#" class="">1</a></li>
	                	<li><a href="#" class="">2</a></li>
	                </ul>
					 <script src="js/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example1').wmuSlider();         
	   		     </script> 
	            </div>
	          </div>
	           	</a>

	   		      <!---->
	   		     <div class="shoes-grid-left">
			<a href="single.html">				 
	   		     	<div class="col-md-6 con-sed-grid">
					
	   		     		<div class=" elit-grid"> 
						
		   		     		<h4>consectetur  elit</h4>
		   		     		<label>FOR ALL PURCHASE VALUE</label>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
							<span class="on-get">GET NOW</span>						
						</div>						
						<img class="img-responsive shoe-left" src="images/sh.jpg" alt=" " />
							
						<div class="clearfix"> </div>
						
	   		     	</div>
					</a>
					<a href="single.html">	
	   		     	<div class="col-md-6 con-sed-grid sed-left-top">
	   		     		<div class=" elit-grid"> 
		   		     		<h4>consectetur  elit</h4>
		   		     		<label>FOR ALL PURCHASE VALUE</label>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
							<span class="on-get">GET NOW</span>
						</div>		
						<img class="img-responsive shoe-left" src="images/wa.jpg" alt=" " />
						
						<div class="clearfix"> </div>
	   		     	</div>
					</a>
	   		     </div>
	   		     <div class="products">
	   		     	<h5 class="latest-product">PRODUK TERBARU</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
								
							
	   		     <div class="product-left">
	   		     <?php 
							$brgterakhir = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY nama LIMIT 3") or die(mysqli_error($conn));
							while($row = mysqli_fetch_assoc($brgterakhir)) { ?>
	   		     	<div class="col-md-4 chain-grid">
	   		     		<a href="single.php?id=<?= $row['kd_barang']; ?>&rl=<?= $row['id_kategori']; ?>"><img class="img-responsive chain" src="paneladmin/modul/produk/img/<?= $row['foto']; ?>" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="single.php?id=<?= $row['kd_barang']; ?>"><?= $row['nama']; ?></a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">Rp. <?= number_format($row['hrg_jual'],2,",","."); ?></span>
		   		     				<!-- <span class="reducedfrom">400$</span> -->
		   		     				  <span class="rating">
									        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
									        <label for="rating-input-1-5" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
									        <label for="rating-input-1-4" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
									        <label for="rating-input-1-3" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
									        <label for="rating-input-1-2" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
									        <label for="rating-input-1-1" class="rating-star"> </label>
							    	   </span>
	   		     				</div>
	   		     				<a class="now-get get-cart" href="beli.php?id=<?= $row['kd_barang']; ?>"><i class="fa fa-shopping-cart"></i> Tambah Di Keranjang</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
	   		     	<!-- wa -->
	   		     	<?php } ?>
	   		     	 <div class="clearfix"> </div>
	   		     </div>
	   		     <div class="products">
	   		     	<h5 class="latest-product">PRODUK TERLARIS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
	   		     <div class="product-left">
	   		     	<?php 
							$brglaris = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY terjual DESC LIMIT 3") or die(mysqli_error($conn));
							while($rowt = mysqli_fetch_assoc($brglaris)) { ?>
	   		     	<div class="col-md-4 chain-grid">
	   		     		<a href="single.php?id=<?= $rowt['kd_barang']; ?>&rl=<?= $rowt['id_kategori']; ?>"><img class="img-responsive chain" src="paneladmin/modul/produk/img/<?= $rowt['foto']; ?>" alt=" " /></a>
	   		     		<span class="star"> </span>
	   		     		<div class="grid-chain-bottom">
	   		     			<h6><a href="single.php?id=<?= $rowt['kd_barang']; ?>"><?= $rowt['nama']; ?></a></h6>
	   		     			<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				<span class="actual">Rp. <?= number_format($rowt['hrg_jual'],2,",","."); ?></span>
		   		     				<!-- <span class="reducedfrom">400$</span> -->
		   		     				  <span class="rating">
									        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
									        <label for="rating-input-1-5" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
									        <label for="rating-input-1-4" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
									        <label for="rating-input-1-3" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
									        <label for="rating-input-1-2" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
									        <label for="rating-input-1-1" class="rating-star"> </label>
							    	   </span>
	   		     				</div>
	   		     				<a class="now-get get-cart" href="beli.php?id=<?= $rowt['kd_barang']; ?>"><i class="fa fa-shopping-cart"></i> Tambah Di Keranjang</a> 
	   		     				<div class="clearfix"> </div>
							</div>
	   		     		</div>
	   		     	</div>
	   		     <?php } ?>
	   		     	 <div class="clearfix"> </div>
	   		     </div>
	   		     <div class="clearfix"> </div>
