<?php 
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])) { 
session_start();
}

$semuaData = [];
$tgl_masuk = "-";
$tgl_sampai = "-";
if(isset($_POST['lihat'])) {
	$tgl_masuk = $_POST['tglm'];
	$tgl_sampai = $_POST['tgls'];

	$ambil = mysqli_query($conn, "SELECT * FROM tb_pembelian pm LEFT JOIN tb_user pl ON pm.id_user = pl.id_user WHERE tgl_pembelian BETWEEN '$tgl_masuk' AND '$tgl_sampai'") or die(mysqli_error($conn));
	while($pecah = mysqli_fetch_assoc($ambil)) {
		$semuaData[] = $pecah;
	}
}

echo "<pre>";
var_dump($semuaData);
echo "</pre>";

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

<h3><i class="fa fa-angle-right"></i> Master Laporan</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Laporan Pembelian</h4>
        <div class="row">
        	<div class="col-md-5">
        		<form action="" method="post">
        		<div class="form-group">
        			<label for="tglm">Dari Tanggal</label>
        			<input type="date" name="tglm" id="tglm" class="form-control" value="<?= $tgl_masuk; ?>">
        		</div>
        	</div>
        	<div class="col-md-5">
						<div class="form-group">
        			<label for="tgls">Sampai Tanggal</label>
        			<input type="date" name="tgls" id="tgls" class="form-control" value="<?= $tgl_sampai; ?>">
        		</div>
        	</div>
        	<div class="col-md-2"><br>
        		<button type="submit" name="lihat" class="btn btn-primary btn-sm">Lihat</button>
        	</div>
        	</form>
        </div>
        <h5>Laporan Pembelian Dari <?= $tgl_masuk ?> Hingga <?= $tgl_sampai; ?></h5>
        <table class="table table-bordered table-striped table-condensed" id="datatables">
				<thead>
					<tr>
						<th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
          $total = 0;
          foreach($semuaData as $key => $value) : ?>
						<?php $total += $value['total_pembelian']; ?>
						<tr>
							<td><?= $key + 1; ?></td>
							<td><?= $value['nama_lengkap']; ?></td>
							<td><?= $value['tgl_pembelian']; ?></td>
							<td><?= number_format($value['total_pembelian']); ?></td>
							<td><?= $value['status_pembelian']; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">Total</th>
						<?php if(empty($total)) : ?>
						<th style="display: none;"><?= number_format($total); ?></th>
						<?php else : ?>
							<th><?= number_format($total); ?></th>
						<?php endif; ?>
						<th></th>
					</tr>
				</tfoot>
        </table>
			</div>
		</div>
	</div>	


</body>
</html>