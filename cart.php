<?php 
  require_once 'lib/config.php';
  if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus" && isset($_GET['id'])) {
      $id_produk = $_GET['id'];
      $query_produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = $id_produk");
      $data_produk = $query_produk->fetch_assoc();
      $subtotal = $data_produk['harga_produk'] * $_SESSION['keranjang_belanja'][$id_produk];
      $_SESSION['grand_total'] -= $subtotal;
      unset($_SESSION['keranjang_belanja'][$id_produk]);
      header('location: cart.php');
    }
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
                    <button class="btn my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
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
                                <a href="admin/logout.php" class="nav-link">Logout</a>
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
      	<div class="col-lg-9 mx-auto">
          <br><br><br><br>
			   <table class="table table-hover table-responsive">
			  <thead>
			    <tr>
			      <th>#No</th>
			      <th>Nama Produk</th>
			      <th>Harga</th>
			      <th>Qty</th>
			      <th>Sub Total </th>
			      <th>Action</th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
            if (!isset($_SESSION['keranjang_belanja'])) {
              header('location: index.php');
            }
            $nomor = 0;
            $grand_total = 0;
            foreach ($_SESSION['keranjang_belanja'] as $id_produk => $jumlah_qty){
              $query = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk=$id_produk");
              while ($data = $query->fetch_assoc()) {
                $subtotal = $data['harga_produk'] * $jumlah_qty;
                $grand_total += $subtotal;
                $_SESSION['grand_total'] = $grand_total;

                ?>
                  <tr>
                    <td><?=++$nomor?></td>
                    <td><?= $data['nama_produk']?></td>
                    <td>Rp.<?= number_format($data['harga_produk'])?></td>
                    <td><?= $jumlah_qty ?></td>
                    <td>Rp.<?= number_format($subtotal) ?> </td>
                    <td><a href="cart.php?action=hapus&id=<?=$data['id_produk']?>">Hapus</a></td>
                  </tr>
                <?php
              }
            }
           ?>         
			  </tbody>
			</table>
			<h3>Grand Total : Rp.<?=number_format($_SESSION['grand_total'])?></h3>
			<a href="checkout.php"><button class="btn btn-primary">Checkout</button></a>  



          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
