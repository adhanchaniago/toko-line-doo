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

<h3><i class="fa fa-angle-right"></i> Master Admin</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Admin</h4>
        <div class="col-lg-12" align="right">
          <a href="<?= "?p=admin&aksi=tambah"; ?>">
        <button type="submit" class="btn btn-theme mb-1">Tambah Data Admin</button></a>
        </div>
        <br><br>
        <section id="unseen">
          <table class="table table-bordered table-striped table-condensed" id="datatables">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Level</th>
                <th>Blokir</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql = mysqli_query($conn, "SELECT * FROM tb_user") or die(mysqli_error($conn));
              while($row = mysqli_fetch_assoc($sql)) { ?>
             <tr>
               <td><?= $no++; ?></td>
               <td><?= $row['username']; ?></td>
               <td><?= $row['nama_lengkap']; ?></td>
               <td><?= $row['email']; ?></td>
               <td><?= $row['no_telp']; ?></td>
               <td><?= $row['level']; ?></td>
               <td><?= $row['blokir']; ?></td>
               <td colspan="2">
                 <a href="?p=admin&aksi=edit&id=<?= $row['id_user']; ?>" class="btn btn-info">Edit</a>
                 <!-- <button type="button" class="btn btn-info">Edit</button> -->
                 <a href="modul/admin/aksi_admin.php?act=hapus&id=<?= $row['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
               </td>
             </tr> 
              <?php } ?>
            </tbody>
          </table>

<?php 
break;
case 'tambah' :
?>
<h3><i class="fa fa-angle-right"></i> Form Admin</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Admin</h4>
              <form class="form-horizontal style-form" method="post" action="modul/admin/aksi_admin.php?act=tambah">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" autofocus="on">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="level">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Blokir</label>
                  <div class="col-sm-10">
                    <input type="radio" name="blokir" value="Y"> Ya
                    <input type="radio" name="blokir" value="N"> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-theme">Tambah Data Admin</button>
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
$sql_edit = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = $id") or die (mysqli_error($conn));
$se = mysqli_fetch_assoc($sql_edit);

?>

<h3><i class="fa fa-angle-right"></i> Form Edit Admin</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Edit Admin</h4>
              <form class="form-horizontal style-form" method="post" action="modul/admin/aksi_admin.php?act=edit">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id_user" value="<?= $se['id_user']; ?>">
                    <input type="text" class="form-control" name="username" autofocus="on" readonly="" value="<?= $se['username']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" value="<?= $se['password']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Konfirmasi Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password2" value="<?= $se['password']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_lengkap" value="<?= $se['nama_lengkap']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="<?= $se['email']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_telp" value="<?= $se['no_telp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="level" value="<?= $se['level']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Blokir</label>
                  <div class="col-sm-10">
                    <input type="radio" name="blokir" value="Y" <?php if($se['blokir'] == 'Y'){echo "checked";} ?>> Ya
                    <input type="radio" name="blokir" value="N" <?php if($se['blokir'] == 'N'){echo "checked";} ?>> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                    <button type="submit" name="ubah" class="btn btn-theme">Ubah Data User</button>
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