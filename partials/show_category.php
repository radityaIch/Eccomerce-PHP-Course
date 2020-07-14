<?php
    if(isset($_GET['category']) && !isset($_GET['search'])){
      $id_kategori = $_GET['category'];
      $query_kategori = $koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori = $id_kategori");
      if($query_kategori->num_rows == 0 ){
        header('location: index.php');
      }
      $data_kategori = $query_kategori->fetch_assoc();
      ?>
        <div class="col-lg-9">
          <br>
          <div class="jumbotron">
            <h1><?= $data_kategori['nama_kategori'] ?></h1>
          </div>

          <div class="row">
                       <?php 
              $query_produk = $koneksi->query("SELECT * FROM tb_produk WHERE stok_produk > 0 AND id_kategori = $id_kategori ORDER BY tgl_produk DESC");
              if($query_produk->num_rows > 0){
                while($data_produk = $query_produk->fetch_assoc()){
                  ?>
                    <div class="col-lg-4 col-md-4 mb-4">
                          <div class="card h-100">
                            <!-- 700 x 400 -->
                            <a href="#"><img class="card-img-top" src="./product_image/<?= $data_produk['foto_produk']?>" alt=""></a>
                            <div class="card-body">
                              <h4 class="card-title">
                                <a href="detail.php?id=7" style="font-size:0.6em"><?=$data_produk['nama_produk']?></a>
                              </h4>
                              <h5 style="font-size:0.8em"><?=number_format($data_produk['harga_produk'])?></h5>
                              <!--<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p> -->
                               <a href="beli.php"><button class="btn btn-success btn-sm mt-lg-2">Add to cart</button></a>
                              <a href="detail.php"><button class="btn btn-primary mt-lg-2 btn-sm">Detail</button></a>
                            </div>
                            <div class="card-footer">
                              <small class="text-muted">Stok : <?=$data_produk['stok_produk']?></small>
                            </div>
                          </div>
                        </div>
                  <?php
                }
              }
              else{
                ?>
                <div class="col-lg-12 text-center">
                  <div class="alert alert-danger">
                    <h3>Produk Kosong</h3>
                  </div>
                </div>
                <?php
              }
             ?>
          </div>

        </div>
      <?php
    }
?>