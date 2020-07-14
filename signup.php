<?php
  require_once 'lib/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page - Decode Ecommerce</title>
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
        <a class="navbar-brand" href="#">Decode Ecommerce</a>
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
              <a class="nav-link" href="index.php"><span class="fa fa-home"></span>Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php"><span class="fa fa-laptop"></span>About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php"><span class="fa fa-user"></span>Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="signup.php"><span class="fa fa-sign-in"></span>Signup</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center justify-content-center" style="flex-direction:column">
        <?php
          if(isset($_SESSION['success_msg']['signup'])){
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?= $_SESSION['success_msg']['signup'];?></strong> 
                        <script type="text/javascript">

                        </script>
                      </div>
                      <?php
                       }else if(isset($_SESSION['error_msg']['signup'])){
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?= $_SESSION['error_msg']['signup'];?></strong> 
                        <script type="text/javascript">
                          
                        </script>
                      </div>
                        <?php
                       }
                       unset($_SESSION['success_msg']['signup']);
                       unset($_SESSION['error_msg']['signup']);
                       ?>
                       
          <div class="form-inner">
            <div class="logo text-uppercase"><span class="text-primary">Signup</span></div>
            
            <form id="login-form" method="post" action="proses_signup.php">
              <div class="form-group">
                <label for="login-username" class="label-custom">Full Name</label>
                <input id="login-username" type="text" name="signup_fullname" required="">
              </div>
               <div class="form-group">
                <label for="login-email" class="label-custom">Email Address</label>
                <input id="login-email" type="email" name="signup_email" required="">
              </div>
              <div class="form-group">
                <label for="login-password" class="label-custom">Password</label>
                <input id="login-password" type="password" name="signup_password" required="">
              </div>
              <div class="form-group">
                <label for="login-phone" class="label-custom">Phone Number</label>
                <input id="login-phone" type="number" name="signup_phone" required="">
              </div>


              <button id="login" class="btn btn-primary" name="signup">Signup</button>
              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
            </form><small>Have an account? </small><a href="login.php" class="signup">Login</a>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="admin/js/front.js"></script>
  </body>
</html>