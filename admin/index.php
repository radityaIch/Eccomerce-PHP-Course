<?php
  require_once '../lib/config.php';
  if(isset($_SESSION['user_login']['level_user'])){
    if($_SESSION['user_login']['level_user'] != 'Admin'){
      header('location: ../login.php');
    }
  }
  if(!isset($_SESSION['user_login'])){
    header('location: ../login.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - Decode Ecommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.blue.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center"><img src="img/avatar-6.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5 text-uppercase" ><?= $_SESSION['user_login']['nama_user']?></h2><span class="text-uppercase">Web Developer</span>
          </div>
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">E</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php?menu=rating"> <i class="icon-presentation"></i><span>Line Charts</span></a></li>
            <li><a href="index.php?menu=kategori"> <i class="icon-list-1"></i><span>Kategori</span></a></li>
            <li><a href="index.php?menu=produk"> <i class="icon-screen"></i><span>Produk</span></a></li>
            <li><a href="index.php?menu=pembelian"> <i class="icon-bill"></i><span>Pembelian</span></a></li>
            <li><a href="index.php?menu=pelanggan"> <i class="icon-user"></i><span>Pelanggan</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page home-page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="../index.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><h3>Decode Ecommerce</h3></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
               
             
                <li class="nav-item"><a href="logout.php" class="nav-link logout"><span class="fa fa-sign-out"></span> Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <section class="section-padding" style="padding:50px 50px">
          <?php  
            require_once('content/dashboard.php');
          ?>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6 text-right">
             
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
  </body>
</html>