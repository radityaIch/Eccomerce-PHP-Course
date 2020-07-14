<?php 
  if (isset($_POST['save_product'])) {
    $nama_produk = $koneksi->real_escape_string($_POST['nama_product']);
    $harga_produk = $koneksi->real_escape_string($_POST['harga_product']);
    $berat_produk = $koneksi->real_escape_string($_POST['berat_product']);
    $stok_produk = $koneksi->real_escape_string($_POST['stok_product']);
    $kategori_produk = $koneksi->real_escape_string($_POST['kategori_product']);
    $deskripsi_produk = $koneksi->real_escape_string($_POST['deskripsi_product']);
    $foto_produk = $_FILES['foto_product'];
    $nama_foto = $foto_produk['name'];
    $tmp_foto = $foto_produk['tmp_name'];
    $lokasi = "C:\\wamp64\\www\\DECODE.ID\\2a\\ecommerce\\product_image\\"; 
    $waktu = date("Y-m-d H:i");
    if(!empty($nama_produk) && !empty($harga_produk) && !empty($berat_produk) && !empty($stok_produk) && !empty($kategori_produk) && !empty($foto_produk)){
      if($foto_produk['type'] == "image/jpeg" || $foto_produk['type'] == "image/jpg" || $foto_produk['type'] == "image/png"){
        if ($foto_produk['size'] < 2048000) {
           if (move_uploaded_file($tmp_foto, $lokasi.$nama_foto)) {
          $query_add = $koneksi->query("INSERT INTO tb_produk VALUES (NULL, '$kategori_produk','$nama_produk','$harga_produk','$berat_produk','$stok_produk','$nama_foto','$deskripsi_produk','$waktu')");
              if ($query_add) {
                $_SESSION['success_msg']['add_produk'] = 'Product successfully added!';
              }
              else{
                $_SESSION['error_msg']['add_produk'] = 'Failed to add product';
              }
          }
          else{
            $_SESSION['error_msg']['add_produk'] = "Failed to upload image!";
          }
        }
        else{
          $_SESSION['error_msg']['add_produk'] = "Max 2MB!";
        }
      }
      else{
        $_SESSION['error_msg']['add_produk'] = "*.jpg or *.png only allowed!";
      }

    }
    else{
      $_SESSION['error_msg']['add_produk'] = "Please fill all field!";
    }
      }


 

      if(isset($_SESSION['success_msg']['add_produk'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['success_msg']['add_produk']?></strong>
    </div>
    <?php
         }else if(isset($_SESSION['error_msg']['add_produk'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['error_msg']['add_produk']?></strong>
    </div>
    <?php
  }
  unset($_SESSION['success_msg']['add_produk']);
  unset($_SESSION['error_msg']['add_produk']);
?>
            <div class="col-lg-12">
	
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Tambah Product</h2>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Nama
                      </label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_product" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="line"></div>
                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Kategori
                      </label>
                      <div class="col-sm-10 select">
                        <select name="kategori_product" class="form-control">
                                 <?php 
                                    $query_kategori = $koneksi->query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
                                    while($data_kategori = $query_kategori->fetch_assoc()){
                                      ?>
                                       <option value="<?= $data_kategori['id_kategori']?>">
                                        <?= $data_kategori['nama_kategori']?>
                                       </option>
                                      <?php 
                                    }
                                  ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Harga (Rp)
                      </label>
                      <div class="col-sm-10">
                        <input type="number" name="harga_product" class="form-control" required>
                      </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Berat (Gram)
                      </label>
                      <div class="col-sm-10">
                        <input type="text" name="berat_product" class="form-control" required>
                      </div>
                    </div>

                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Stok Produk
                      </label>
                      <div class="col-sm-10">
                        <input type="number" name="stok_product" class="form-control">
                      </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="deskripsi_product"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Foto Product
                      </label>
                      <div class="col-sm-10">
                        <input type="file" name="foto_product" class="form-control-file" required>
                        <small>Max 2MB</small>
                      </div>
                    </div>

                    <div class="line"></div>

                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="save_product">Save Product</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>