<?php
  require_once 'lib/config.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Page - Decode Ecommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="admin/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="admin/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/shop-homepage.css" id="theme-stylesheet">
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/login.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Decode Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="mx-auto">
          <form class="form-inline my-2 my-lg-0" action="index.php">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
          <button class="btn my-2 my-sm-0" type="submit" >Search</button>
        </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="about.php"><span class="fa fa-laptop"></span> About</a>
            </li>
             <?php 
                        if (isset($_SESSION['user_login'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="info.php"><span class="fa fa-user"></span> <?=$_SESSION['user_login']['nama_user']?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><span class="fa fa-shopping-cart"></span> Rp. <?=number_format($_SESSION['grand_total'])?></a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/logout.php" class="nav-link"><span class="fa fa-sign-out"></span> Logout</a>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><span class="fa fa-user"></span> Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php"><span class="fa fa-sign-in"></span> Signup</a>
                            </li>
                            <?php
                        }
                     ?>
          </ul>
        </div>
      </div>
    </nav>


    
           
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="admin/js/front.js"></script> -->
  </body>
</html>