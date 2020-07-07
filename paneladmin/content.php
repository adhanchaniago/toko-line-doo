<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <?php 
  if($_GET['p'] == 'home') {
    require_once 'home.php';
  } else if($_GET['p'] == 'produk') {
    require_once 'modul/produk/produk.php';
  } else if($_GET['p'] == 'kategori') { 
    require_once 'modul/kategori/kategori.php';
  } else if($_GET['p'] == 'admin') {
    require_once 'modul/admin/admin.php';
  } else if($_GET['p'] == 'pembelian') {
    require_once 'modul/pembelian/pembelian.php';
  } else if($_GET['p'] == 'detail') {
    require_once 'modul/pembelian/detail.php';
  } else if($_GET['p'] == 'pembayaran') {
    require_once 'modul/pembelian/pembayaran.php';
  } else if($_GET['p'] == 'lihat_pembayaran') {
    require_once 'modul/pembelian/lihat_pembayaran.php'; 
  } else if($_GET['p'] == 'lihat_laporan') {
    require_once 'modul/pembelian/lihat_laporan.php';
  } else {
    require_once '404.php';
  }
  ?>


</body>
</html>