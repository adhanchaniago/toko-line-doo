<div class=" top-nav rsidebar span_1_of_left">
	<h3 class="cate">KATEGORI PRODUK</h3>
		<ul class="menu">
			<?php 
			$menu = mysqli_query($conn, "SELECT * FROM tb_kategori") or die(mysqli_error($conn));
			while($row = mysqli_fetch_assoc($menu)) { ?>
				<li>
					<ul class="kid-menu">
						<li><a href="product.html"><?= $row['nama_kategori']; ?></a></li>
					</ul>
				</li>
			<?php } ?>
		</ul>
</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
					<div class="chain-grid menu-chain">
	   		     		<a href="single.html"><img class="img-responsive chain" src="images/wat.jpg" alt=" " /></a>	   		     		
	   		     		<div class="grid-chain-bottom chain-watch">
		   		     		<span class="actual dolor-left-grid">300$</span>
		   		     		<span class="reducedfrom">500$</span>  
		   		     		<h6><a href="single.html">Lorem ipsum dolor</a></h6>  		     			   		     										
	   		     		</div>
	   		     	</div>
	   		     	 <a class="view-all all-product" href="product.html">VIEW ALL PRODUCTS<span> </span></a> 	
			</div>
	   		    <div class="clearfix"> </div> 
