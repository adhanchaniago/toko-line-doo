<?php 
if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])) { 
session_start();



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

  $aksi = "modul/kategori/aksi_kategori.php";
  switch(@$_GET['aksi']) {
    default:

?>

<h3><i class="fa fa-angle-right"></i> Master kategori</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data kategori</h4>
        <div class="col-lg-12" align="right">
          <a href="<?= "?p=kategori&aksi=tambah"; ?>">
        <button type="submit" class="btn btn-theme mb-1">Tambah Data Kategori</button></a>
        </div>
        <br><br>
        <section id="unseen">
          <table class="table table-bordered table-striped table-condensed" id="datatables">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC") or die(mysqli_error($conn));
              while($row = mysqli_fetch_assoc($sql)) { ?>
             <tr>
               <td><?= $no++; ?></td>
               <td><?= $row['id_kategori']; ?></td>
               <td><?= $row['nama_kategori']; ?></td>
               <td colspan="2">
                 <a href="?p=kategori&aksi=edit&id=<?= $row['id_kategori']; ?>" class="btn btn-info">Edit</a>
                 <!-- <button type="button" class="btn btn-info">Edit</button> -->
                 <a href="modul/kategori/aksi_kategori.php?act=hapus&id=<?= $row['id_kategori']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
               </td>
             </tr> 
              <?php } ?>
            </tbody>
          </table>

<?php 
break;
case 'tambah' :
?>
<h3><i class="fa fa-angle-right"></i> Form Kategori</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Kategori</h4>
              <form class="form-horizontal style-form" method="post" action="modul/kategori/aksi_kategori.php?act=tambah">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_kategori">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-theme">Tambah Data</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
</div>
<?php       
break;
case 'edit' :

$id = $_GET['id']; 
$sql_edit = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = $id") or die (mysqli_error($conn));
$se = mysqli_fetch_assoc($sql_edit);

?>

<h3><i class="fa fa-angle-right"></i> Form Edit Kategori</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Edit Kategori</h4>
              <form class="form-horizontal style-form" method="post" action="modul/kategori/aksi_kategori.php?act=edit">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id_kategori" value="<?= $se['id_kategori']; ?>">
                    <input type="text" class="form-control" name="nama_kategori" value="<?= $se['nama_kategori']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" name="ubah" class="btn btn-theme">Ubah Data</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
</div>

<?php
break;
} // switch

} // else

?>