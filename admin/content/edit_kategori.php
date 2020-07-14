<?php 
  $id = $_GET['id'];
  $query_kategori = $koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori=$id");
  if ($query_kategori->num_rows>0) {
    $data_kategori = $query_kategori->fetch_assoc();
  }
  else{
    header('location: index.php?menu=kategori');
  }

  if (isset($_POST['update_kategori'])) {
    $nama_kategori = $koneksi->real_escape_string($_POST['nama_kategori']);
    $query_update =  $koneksi->query("UPDATE tb_kategori SET nama_kategori='$nama_kategori'WHERE id_kategori=$id");
    if($query_update){
      $_SESSION['success_msg']['update_kategori'] = "Category is successfully updated!";
    }
    else{
      $_SESSION['error_msg']['update_kategori'] = "Error while updated category!";
    }
      echo "<script>setTimeout(function(){
      location.href= 'index.php?menu=kategori'},1000);
    </script>";
  }
 ?>
                          <?php
                            if (isset($_SESSION['success_msg']['update_kategori'])) {
                              ?>
                               <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?=$_SESSION['success_msg']['update_kategori'] = "Category is successfully updated!"?></strong> 
                      </div>
                      <?php 
                            }
                            elseif(isset($_SESSION['error_msg']['update_kategori'])){
                              ?>
                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <strong><?=$_SESSION['error_msg']['update_kategori'] = "Error while updated category!"?></strong> 
                      </div>
                      <?php 
                            }
                            unset($_SESSION['success_msg']['update_kategori']);
                            unset($_SESSION['error_msg']['update_kategori']);
                          ?>
                        
<div class="col-lg-12">
			
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Edit Kategori</h2>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Nama Kategori</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kategori" value="<?= $data_kategori['nama_kategori'] ?>" required>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="update_kategori">Simpan Perubahan</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            
</div>