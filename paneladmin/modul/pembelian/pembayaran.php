<?php 
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])) { 
session_start();
}
 
$id_pembayaran = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE id_pembelian = $id_pembayaran") or die(mysqli_error($conn));
$detail = mysqli_fetch_assoc($ambil);


// jika tombol proses di klik
if(isset($_POST['proses'])) {
  $resi = $_POST['resi'];
  $status = $_POST['status'];

  mysqli_query($conn, "UPDATE tb_pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = $id_pembayaran") or die(mysqli_error($conn));
  echo "<script>alert('data pembelian sudah di update.');window.location='media.php?p=pembelian';</script>";
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
<pre>
<?php var_dump($detail); ?>
</pre>
<h3><i class="fa fa-angle-right"></i> Master Pembayaran</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Pembayaran</h4>

        <div class="row">
          <div class="col-md-6">
            <table class="table">
              <tr>
                <th>Nama</th>
                <td><?= $detail['nama']; ?></td>
              </tr>
              <tr>
                <th>Bank</th>
                <td><?= $detail['bank']; ?></td>
              </tr>
              <tr>
                <th>Tanggal</th>
                <td><?= $detail['tanggal']; ?></td>
              </tr>
            </table>
            <div class="col-md-12">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="resi">No. Resi</label>
                    <input type="text" name="resi" id="resi" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">Pilih Status</option>
                      <option value="Barang Dikirim">Barang Dikirim</option>
                      <option value="Batal">Batal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="proses" class="btn btn-primary">Proses</button>
                  </div>
                </form>
            </div>
          </div>
          <div class="col-md-6">
            <img src="../images/bukti/<?= $detail
            ['bukti']; ?>" width="500">
          </div>
        </div>
      
      </div>
    </div> 
  </div>