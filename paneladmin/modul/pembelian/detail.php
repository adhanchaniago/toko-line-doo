<?php  
$id_pembelian = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_user = tb_user.id_user WHERE id_pembelian = $id_pembelian") or die(mysqli_error($conn));
$detail = mysqli_fetch_assoc($ambil);

?>
<pre><?php var_dump($detail); ?></pre>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Note Found</title>

  <!-- Bootstrap core CSS -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
</head>

<body>

<h3><i class="fa fa-angle-right"></i> Master Detail Pembelian</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Detail</h4>
			
			<div class="row">
				<div class="col-md-4">
					<h3>Pembelian</h3>
					<p>
						Tanggal : <?= $detail['tgl_pembelian']; ?><br>
						Total : <?= number_format($detail['total_pembelian']); ?><br>
						Status : <?= $detail['status_pembelian']; ?>
					</p>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<b><?= $detail['nama_lengkap']; ?></b><br>
					<?= $detail['email']; ?><br>
					<?= $detail['no_telp']; ?>
				</div>
				<div class="col-md-4">
					<h3>Pengiriman</h3>
					<b><?= $detail['nama_kota']; ?></b><br>
					Tarif : <?= $detail['tarif']; ?><br>
					Alamat : <?= $detail['alamat_pengiriman']; ?>
				</div>

				<div class="col-md-12">
					<table class="table">
						<tr>
							<th>No.</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Subtotal</th>
						</tr>
						<?php 
						$no = 1;
						$pembelian_barang = mysqli_query($conn, "SELECT * FROM tb_pembelian_barang JOIN tb_barang ON tb_pembelian_barang.kd_barang = tb_barang.kd_barang WHERE tb_pembelian_barang.id_pembelian = $id_pembelian") or die(mysqli_error($conn));
						while($row = mysqli_fetch_assoc($pembelian_barang)) {
						?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $row['nama']; ?></td>
							<td><?= $row['harga']; ?></td>
							<td><?= $row['jumlah']; ?></td>
							<td>
								<?= number_format($row['hrg_jual'] * $row['jumlah']); ?>
							</td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>

			</div>
		</div>
	</div>
</div>