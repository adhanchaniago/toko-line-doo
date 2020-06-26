<?php  
session_start();
require_once '../config/functions.php';

if(!empty($_SESSION['username']) AND !empty($_SESSION['passuser'])) {
  header("Location: media.php");
  exit;
}

// if(isset($_POST["login"])) {
//   $username = $_POST["username"];
//   $password = $_POST["password"];

//   // cek username, apakah ada di dalam databse
//   $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
//   // jika nilai 1 berhasil login, kalau 0 gagal
//   if(mysqli_num_rows($result) === 1) {
//     // cek password
//     $row = mysqli_fetch_assoc($result);
//     if(password_verify($password, $row["password"])) {
//       // set session
//       // $_SESSION["login"] = true;

//       // cek remember me
//       // if(isset($_POST["remember"])) {
//       //   // buat cookie
//       //   setcookie('id', $row['id'], time() + 60);
//       //   setcookie('key', hash('sha256', $row['username']), time()+60);
//       // }

//       header("Location: media.php?p=home");
//       exit;
//     }
//   }
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Halaman Login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="cek_login.php" method="post">
        <h2 class="form-login-heading">Login Sekarang</h2>
        <div class="login-wrap">
          <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
          </div>
          <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="checkbox" name="remember" value="remember-me"> Ingat Saya
          </div>
          <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock"></i> Masuk</button>
          <hr>
          <div class="registration">
            Belum Punya Akun?<br/>
            <a class="" href="#">
              Buat Akun
              </a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
