<?php 
// session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])) { 



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
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<div class="container">
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3 p404 centered">
        <img src="img/404.png" alt="">
        <h1>Jangan Panik Dulu!!</h1>
        <h3>Halaman yang Anda cari tidak ada.</h3>
        <br>
        <h5 class="mt">Silahkan Login Dulu:</h5>
        <p><a href="../../index.php">Login</a></p>
      </div>
    </div>
  </div>

<?php
} else {
?>

<h3><i class="fa fa-angle-right"></i> Master Produk</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Data Produk</h4>
              <div class="col-lg-12" align="right">
                <a href="modul/produk/tambah_produk.php">
              <button type="submit" class="btn btn-theme mb-1">Tambah Data Produk</button></a>
              </div>
              <br><br>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Tanggal Masuk</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY nama ASC") or die(mysqli_error($conn));
                    while($row = mysqli_fetch_assoc($sql)) { ?>
                   <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $row['nama']; ?></td>
                     <td><?= $row['id_kategori']; ?></td>
                     <td><?= $row['hrg_jual']; ?></td>
                     <td><?= $row['tgl_masuk']; ?></td>
                     <td><?= $row['jumlah']; ?></td>
                     <td colspan="2">
                       <button type="button" class="btn btn-info">Edit</button>
                       <button type="button" class="btn btn-danger">Hapus</button>
                     </td>
                   </tr> 
                    <?php } ?>
                  </tbody>
                </table>
<?php
} // else

?>