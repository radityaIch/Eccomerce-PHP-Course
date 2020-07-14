<?php 
  $id = $_GET['id'];
  $query_produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id' ");
  $data_produk;
  // $ada_data = false;
  if($query_produk->num_rows > 0){
    $data_produk = $query_produk->fetch_assoc();
    // $ada_data = true;
  }
  else{
    header('location: index.php?menu=produk');
  }
  if (isset($_POST['update_product'])) {
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
    if(!empty($nama_produk) && !empty($harga_produk) && !empty($berat_produk) && is_numeric($stok_produk) && !empty($kategori_produk)){
      if(empty($foto_produk['name'])){
        $query_update = $koneksi->query("UPDATE tb_produk SET nama_produk='$nama_produk',harga_produk='$harga_produk',berat_produk='$berat_produk',stok_produk='$stok_produk', id_kategori='$kategori_produk',deskripsi_produk='$deskripsi_produk',tgl_produk='$waktu' WHERE id_produk='$id'");
      }
      else{
      if($foto_produk['type'] == "image/jpeg" || $foto_produk['type'] == "image/jpg" || $foto_produk['type'] == "image/png"){
        if ($foto_produk['size'] < 2048000) {
           if (move_uploaded_file($tmp_foto, $lokasi.$nama_foto)) {
            $foto_lama = $data_produk['foto_produk'];
            unlink("C:\\wamp64\\www\\DECODE.ID\\2a\\ecommerce\\product_image\\$foto_lama");
          $query_update = $koneksi->query("UPDATE tb_produk SET nama_produk='$nama_produk',harga_produk='$harga_produk',berat_produk='$berat_produk',stok_produk='$stok_produk',id_kategori='$kategori_produk',deskripsi_produk='$deskripsi_produk',tgl_produk='$waktu',foto_produk='$nama_foto' WHERE id_produk='$id'");
             
          }
          else{
            $_SESSION['error_msg']['update_produk'] = "Failed to upload image!";
          }
        }
        else{
          $_SESSION['error_msg']['update_produk'] = "Max 2MB!";
        }
      }
      else{
        $_SESSION['error_msg']['update_produk'] = "*.jpg or *.png only allowed!";
      }
      }

    }
    else{
      $_SESSION['error_msg']['update_produk'] = "Please fill all field!";
    }
    ?>
    <script type="text/javascript">
    <?php
    if($query_update){
      $_SESSION['success_msg']['update_produk'] = 'Product successfully updated';
      ?>
      setTimeout(function(){
      location.href = 'index.php?menu=produk';
      }, 1000);
      </script>
      <?php
    }
    ?>
    <script type="text/javascript">
    else{
      $_SESSION['error_msg']['update_produk'] = 'Failed to update Product';
      ?>
      setTimeout(function(){
      location.href = 'index.php?menu=produk';
      }, 1000);
      </script>
      <?php
    }
    


 

      if(isset($_SESSION['success_msg']['update_produk'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['success_msg']['update_produk']?></strong>
    </div>
    <?php
         }else if(isset($_SESSION['error_msg']['update_produk'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['error_msg']['update_produk']?></strong>
    </div>
    <?php
  }
  unset($_SESSION['success_msg']['update_produk']);
  unset($_SESSION['error_msg']['update_produk']);
?>
            <div class="col-lg-12">
	
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Edit Product</h2>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Nama
                      </label>
                      <div class="col-sm-10">
                        <input type="text" name="nama_product" class="form-control" value="<?= $data_produk['nama_produk'] ?>" required>
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
                                    $query_kategori = $koneksi->query("SELECT * FROM tb_kategori ORDER BY nama_kategorI ASC");
                                    while($data_kategori = $query_kategori->fetch_assoc()){
                                       if($data_produk['id_kategori'] == $data_kategori['id_kategori']){
                                        ?> 
                                      <option value="<?= $data_kategori['id_kategori'] ?>"selected><?=$data_kategori['nama_kategori']?></option>
                                      <?php
                                    }
                                    else{
                                  ?>
                                   <option value="<?= $data_kategori['id_kategori'] ?>"><?=$data_kategori['nama_kategori']?></option>
                                   <?php  
                                }
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
                        <input type="number" name="harga_product" class="form-control" value="<?= $data_produk['harga_produk'] ?>" required>
                      </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Berat (Gram)
                      </label>
                      <div class="col-sm-10">
                        <input type="text" name="berat_product" class="form-control" value="<?=$data_produk['berat_produk']?>" required>
                      </div>
                    </div>

                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Stok Produk
                      </label>
                      <div class="col-sm-10">
                        <input type="number" name="stok_product" class="form-control" value="<?=$data_produk['stok_produk']?>">
                      </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Deskripsi</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="deskripsi_product"><?=$data_produk['deskripsi_produk']?></textarea>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Foto Product Sebelumnya
                      </label>
                      <div class="col-sm-10">
                        <img src="../product_image/<?=$data_produk['foto_produk']?>" width="100px">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">
                        Foto Product
                      </label>
                      <div class="col-sm-10">
                        <input type="file" name="foto_product" class="form-control-file">
                        <small>Max 2MB</small>
                      </div>
                    </div>

                    <div class="line"></div>

                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>