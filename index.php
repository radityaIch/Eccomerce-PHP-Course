<?php 
    ob_start();
    require_once "lib/config.php";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Decode - Ecommerce</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="stylesheet" href="css/modal-login.css">

</head>

<body>
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
        <div class="container">
            <?php   
                    if(isset($_SESSION['user_login'])){
                        if ($_SESSION['user_login']['level_user'] == "Admin") {
                        ?>
                        <a class="navbar-brand" href="admin/index.php">Decode Ecommerce</a>
                        <?php
                        }
                        else{
                        ?>
                        <a class="navbar-brand" href="index.php">Decode Ecommerce</a>
                        <?php
                        }
                    }
                    else{
                        ?>
                        <a class="navbar-brand" href="index.php">Decode Ecommerce</a>
                        <?php
                    }
                
             ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mx-auto">
                <form class="form-inline my-2 my-lg-0" method="GET">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                    <button class="btn my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><span class="fa fa-home"></span> Home
                <span class="sr-only">(current)</span>
              </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><span class="fa fa-laptop"></span> About</a>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php  
          require('partials/category.php');
          require('partials/index_page.php');
          require('partials/show_category.php');
          require('partials/search.php');
        ?>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>