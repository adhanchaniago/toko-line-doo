<?php 
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])) { 
session_start();
}

?>
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

<h3><i class="fa fa-angle-right"></i> Master Pembelian</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Pembelian</h4>
        <a href="media.php?p=lihat_laporan" class="btn btn-primary">Laporan</a>
        <table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$ambil = mysqli_query($conn, "SELECT * FROM tb_pembelian JOIN tb_user ON tb_pembelian.id_user = tb_user.id_user") or die(mysqli_error($conn));
					while($detail = mysqli_fetch_assoc($ambil)) {

					?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $detail['nama_lengkap']; ?></td>
						<td><?= $detail['tgl_pembelian']; ?></td>
						<td><?= $detail['status_pembelian']; ?></td>
						<td><?= $detail['total_pembelian']; ?></td>
						<td>
							<a href="media.php?p=detail&id=<?= $detail['id_pembelian']; ?>" class="btn btn-primary">Detail</a>
							<?php if($detail['status_pembelian'] !== 'pending') : ?>
							<a href="media.php?p=pembayaran&id=<?= $detail['id_pembelian']; ?>" class="btn btn-info">Pembayaran</a>
							<?php endif; ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
        </table>
			</div>
		</div>
	</div>	


</body>
</html>