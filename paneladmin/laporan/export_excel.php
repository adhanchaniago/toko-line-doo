<?php  
require_once '../../config/koneksi.php';

// nama file
 $filename="data barang-".date('Ymd').".xls";

 //header info for browser
header("Content-Type: application/vnd-ms-excel"); 
header('Content-Disposition: attachment; filename="' . $filename . '";');

$query = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));


?>
<table class="table table-bordered table-striped table-condensed" id="datatables">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Tanggal Masuk</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$no = 1;
  	while($row = mysqli_fetch_assoc($query)) { ?>
    <tr>
    	<td><?= $no++ ?></td>
    	<td><?= $row['nama']; ?></td>
    	<td><?= $row['hrg_jual']; ?></td>
    	<td><?= $row['tgl_masuk']; ?></td>
    	<td><?= $row['jumlah']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>