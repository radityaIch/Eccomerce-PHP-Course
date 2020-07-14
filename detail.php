<?php 
  require_once 'lib/config.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_produk = $koneksi->query("SELECT * FROM tb_produk INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id_kategori WHERE tb_produk.id_produk = $id");
    if($query_produk->num_rows > 0){
      $data_produk = $query_produk->fetch_assoc();
    }
    else{
      header('location: index.php');
    }
  }
  else{
    header('location: index.php');
  }
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

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Decode Ecommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="mx-auto">
          <form class="form-inline my-2 my-lg-0" method="GET">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
          <button class="btn my-2 my-sm-0" type="submit" >Search</button>
        </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['user_login'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="info.php"><?=$_SESSION['user_login']['nama_user']?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><span class="fa fa-shopping-cart"></span> Rp.<?=number_format($_SESSION['grand_total'])?></a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Logout</a>
                            </li>
                            <?php
                        }
                        else{
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Signup</a>
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

        <div class="col-lg-3">
        	<br>
          <img src="./product_image/<?=$data_produk['foto_produk']?>" width="100%">
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <br><br>
       	<h3><?=$data_produk['nama_produk']?></h3>
       	<a href="index.php?category=<?=$data_produk['id_kategori']?>"><h6><?=$data_produk['nama_kategori']?></h6></a>
       	<div class="row">
       		<div class="col-md-8">
       		<p><?=$data_produk['deskripsi_produk']?></p>
       	</div>
       	</div>
       <strong>	<p style="color:#33b35a">Rp.<?= number_format($data_produk['harga_produk'])?></p></strong>
      <a href="beli.php?id=<?=$data_produk['id_produk']?>"><button class="btn btn-primary">Add to cart</button></a>
       <a href="index.php"> <button class="btn btn-secondary">Continue Shopping</button></a>
   </div>
</div>
   		<hr>
   		 <h3 class="mt-lg-5">Product Lainnya</h3>
          <div class="row">
              <?php 
                $query_lainnya = $koneksi->query("SELECT * FROM tb_produk ORDER BY RAND() LIMIT 4");
                if($query_lainnya->num_rows>0){
                  while($data_lainnya = $query_lainnya->fetch_assoc()){
                    ?> <div class="col-lg-3 col-md-4 mb-4">
                        <div class="card h-100">
                          <!-- 700 x 400 -->
                          <a href=""><img class="card-img-top" src="./product_image/<?=$data_lainnya['foto_produk']?>" alt=""></a>
                          <div class="card-body">
                            <h4 class="card-title">
                              <a href="detail.php?id=<?=$data_produk['id_produk']?>" style="font-size:0.6em"><?=$data_lainnya['nama_produk']?></a>
                            </h4>
                            <h5 style="font-size:0.8em">Rp.<?=number_format($data_lainnya['harga_produk'])?></h5>
                            <a href="beli.php?id=<?=$data_lainnya['id_produk']?>"><button class="btn btn-success btn-sm mt-lg-2">Add to cart</button></a>
                            <a href="detail.php?id=<?=$data_lainnya['id_produk']?>"><button class="btn btn-primary mt-lg-2 btn-sm">Detail</button></a>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted"><?=$data_lainnya['stok_produk']?></small>
                          </div>
                        </div>
                      </div>
                <?php
                  }
                }
                else{

                }
              ?>
                     
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
 
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
