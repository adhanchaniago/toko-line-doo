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

  <!-- DataTables -->
  <link href="../../assets/DataTables/datatables.min.css" rel="stylesheet" />

  
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

  $aksi = "modul/produk/aksi_produk.php";
  switch(@$_GET['aksi']) {
    default:

?>

<h3><i class="fa fa-angle-right"></i> Master Produk</h3>
  <div class="row mt">
    <div class="col-lg-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Data Produk</h4>
        <div class="col-lg-12" align="right">
          <a href="<?= "?p=produk&aksi=tambah"; ?>">
        <button type="submit" class="btn btn-theme mb-1">Tambah Data Produk</button></a>
        <a href=""></a>
        <!-- Single button -->
        <div class="btn-group">
          <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
            Export <span class="caret"></span>
            </button>
          <ul class="dropdown-menu" role="menu">
            <li><a href="laporan/export_pdf.php" target="_blank">Export to PDF</a></li>
            <li class="divider"></li>
            <li><a href="laporan/export_excel.php" target="_blank">Export to Excel</a></li>
            <!-- <li><a href="#">Something else here</a></li> -->
            <!-- <li><a href="#">Separated link</a></li> -->
          </ul>
        </div>
        </div>
        <br><br>
        <section id="unseen">
          <table class="table table-bordered table-striped table-condensed" id="datatables">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah</th>
                <th>Headline</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              require_once 'function.php';
              $no = 1;
              $sql = mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY nama ASC") or die(mysqli_error($conn));
              while($row = mysqli_fetch_assoc($sql)) { ?>
             <tr>
               <td><?= $no++; ?></td>
               <td><?= $row['nama']; ?></td>
                
              <?php 
              $idk = $row['id_kategori'];
              $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = $idk") or die(mysqli_error($conn));
              $ktg = mysqli_fetch_assoc($kategori);
              ?>

               
               <td><?= $ktg['nama_kategori']; ?></td>
               <td><?= number_format($row['hrg_jual']); ?></td>
               <td><?= date('d-M-Y', strtotime($row['tgl_masuk'])) ; ?></td>
               <td><?= $row['jumlah_brg']; ?></td>
               <td><?= yn($row['headline']); ?></td>
               <td colspan="2">
                 <a href="?p=produk&aksi=edit&id=<?= $row['kd_barang']; ?>" class="btn btn-info">Edit</a>
                 <a href="?p=produk&aksi=detail&id=<?= $row['kd_barang']; ?>" class="btn btn-success">Detail</a>
                 <!-- <button type="button" class="btn btn-info">Edit</button> -->
                 <a href="modul/produk/aksi_produk.php?act=hapus&id=<?= $row['kd_barang']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
               </td>
             </tr> 
              <?php } ?>
            </tbody>
          </table>

<?php 
break;
case 'tambah' :
?>
<h3><i class="fa fa-angle-right"></i> Form Components</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Produk</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="modul/produk/aksi_produk.php?act=tambah">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_produk">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="id_kategori" id="id_kategori" class="form-control">
                      <?php 
                      $sql = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY nama_kategori") or die(mysqli_error($conn));
                      while($row = mysqli_fetch_assoc($sql)) { ?>
                        <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>       
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="jumlah" name="jumlah" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Headline</label>
                  <div class="col-sm-10">
                      <input type="radio" name="headline" value="Y"> Ya
                      <input type="radio" name="headline" value="T"> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2 col-sm-2">Tanggal Masuk</label>
                  <div class="col-sm-3">
                    <input class="form-control form-control-inline input-medium" name="tgl_masuk" type="date" value="">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="harga" name="hrg_jual" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Terjual</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="terjual" name="terjual" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok Barang</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="stok" name="stok" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                  <div class="col-md-9">
                    <!-- <div class="fileupload fileupload-new input-tambah" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default input-tambah" name="foto[]">
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div> -->
                    <div class="input-tambah">
                    <input type="file" class="default" name="foto[]">
                    </div>
                    <button type="button" id="tombolTambahGambar" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    <!-- <span class="label label-info">NOTE!</span>
                    <span>
                      Attached image thumbnail is
                      supported in Latest Firefox, Chrome, Opera,
                      Safari and Internet Explorer 10 only
                      </span> -->
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
$sql_edit = mysqli_query($conn, "SELECT * FROM tb_barang WHERE kd_barang = $id") or die (mysqli_error($conn));
$se = mysqli_fetch_assoc($sql_edit);

?>

<h3><i class="fa fa-angle-right"></i> Form Edit Produk</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Formulir Edit Produk</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" action="modul/produk/aksi_produk.php?act=edit">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="kd_barang" value="<?= $se['kd_barang']; ?>">
                    <input type="text" class="form-control" name="nama_produk" value="<?= $se['nama']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="id_kategori" id="id_kategori" class="form-control">
                      <?php
                      $sqlk = mysqli_query($conn, "SELECT * FROM tb_kategori") or die(mysqli_error($conn));
                      foreach($sqlk as $k) { ?>
                      <option value="<?= $k['id_kategori']; ?>" <?php if($se['id_kategori'] == $k['id_kategori']){echo "selected";} ?>><?= $k['nama_kategori']; ?></option>

                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="deskripsi" id="deskripsi" class="form-control"><?= $se['deskripsi']; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="jumlah" name="jumlah" type="text" value="<?= $se['jumlah_brg']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Headline</label>
                  <div class="col-sm-10">
                      <input type="radio" name="headline" value="Y" <?php if($se['headline'] == 'Y') echo 'checked'?>> Ya
                      <input type="radio" name="headline" value="T" <?php if($se['headline'] == 'T') echo 'checked'?>> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="stok" name="stok" type="text" value="<?= $se['stok_barang']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2 col-sm-2">Tanggal Masuk</label>
                  <div class="col-sm-3">
                    <input class="form-control form-control-inline input-medium" name="tgl_masuk" type="date" value="<?= $se['tgl_masuk']; ?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="harga" name="hrg_jual" value="<?= $se['hrg_jual']; ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Terjual</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="terjual" name="terjual" type="text" value="<?= $se['terjual']; ?>">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label col-md-3">Default</label>
                  <div class="col-md-4">
                    <input type="text" name="fotoLama" value="<?= $se['foto']; ?>">
                    <input type="file" class="default" name="foto">
                    <img src="modul/produk/img/<?= $se['foto']; ?>" width="100">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <!-- <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" /> -->
                        <img src="modul/produk/img/<?= $se['foto']; ?>">
                      </div>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                          <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" class="default" name="foto">
                        </span>
                        <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
                      </div>
                    </div>
                        <input type="hidden" name="fotoLama" value="<?= $se['foto']; ?>">
                    <span class="label label-info">NOTE!</span>
                    <span>
                      Attached image thumbnail is
                      supported in Latest Firefox, Chrome, Opera,
                      Safari and Internet Explorer 10 only
                      </span>
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
case 'detail' :
$id_produk = $_GET['id'];

$tampilBarangId = mysqli_query($conn, "SELECT * FROM tb_barang INNER JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori WHERE kd_barang = $id_produk") or die(mysqli_error($conn));
$pecahBarang = mysqli_fetch_assoc($tampilBarangId);

// mengambil foto
$semuaBarang = [];
$tampilProdukFoto = mysqli_query($conn, "SELECT * FROM tb_produk_foto WHERE kd_barang = $id_produk") or die(mysqli_error($conn));
while($ambilFoto = mysqli_fetch_assoc($tampilProdukFoto)) {
  $semuaBarang[] = $ambilFoto;
}
//  echo "<pre>";
// var_dump($semuaBarang);
//  echo "<pre>";

?>
<h3><i class="fa fa-angle-right"></i> Form Components</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i> Detail Produk</h4>
  
      <div class="row">
        <div class="col-lg-12">
          <table class="table">
            <tr>
              <th>Kategori</th>
              <td><?= $pecahBarang['nama_kategori']; ?></td>
            </tr>
            <tr>
              <th>Barang</th>
              <td><?= $pecahBarang['nama']; ?></td>
            </tr>
            <tr>
              <th>Harga</th>
              <td><?= $pecahBarang['hrg_jual']; ?></td>
            </tr>
            <tr>
              <th>Stok</th>
              <td><?= $pecahBarang['stok_barang']; ?></td>
            </tr>
            <tr>
              <th>Deskripsi</th>
              <td><?= $pecahBarang['deskripsi']; ?></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row">
        <?php foreach($semuaBarang as $key => $value) : ?>
        <div class="col-md-4">
          <?php if($key === 0) : ?>
          <img src="modul/produk/img/<?= $value['nama_produk_foto']; ?>" width="200"><br>
          <span class="label label-info">NOTE!</span>
          <span>
            ini adalah foto produk utama anda.
            </span>
          <?php else: ?>
          <img src="modul/produk/img/<?= $value['nama_produk_foto']; ?>" width="200">
          <!-- <a href="media.php?p=hapusfotoproduk&idfoto=<?= $value['id_produk_foto']; ?>&idproduk=<?= $id_produk; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a> -->
          <a href="modul/produk/aksi_produk.php?act=hapusfotoproduk&idfoto=<?= $value['id_produk_foto']; ?>&idproduk=<?= $id_produk; ?>" onclick="return confirm('Yakin')" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <label for="tambahFoto">Tambah Foto</label>
            <input type="file" name="tambahFoto" id="tambahFoto">
            <button type="submit" name="tambahFoto"><i class="fa fa-plus"></i></button>
          </form>
          <?php 
          if(isset($_POST['tambahFoto'])) {
            $tambahFoto = $_FILES['tambahFoto']['name'];
            $tmpTambahFoto = $_FILES['tambahFoto']['tmp_name'];

            move_uploaded_file($tmpTambahFoto, 'modul/produk/img/' . $tambahFoto);
            mysqli_query($conn, "INSERT INTO tb_produk_foto (kd_barang, nama_produk_foto) VALUES ('$id_produk', '$tambahFoto')") or die(mysqli_error($conn));
            echo "<script>alert('Foto Berhasil Ditambahkan.');window.location='media.php?p=produk&aksi=detail&id=$id_produk';</script>";
          }
          ?>
        </div>
      </div>

    </div>
  </div>
  <!-- col-lg-12-->
</div>

<?php
break;
} // switch

} // else

?>
