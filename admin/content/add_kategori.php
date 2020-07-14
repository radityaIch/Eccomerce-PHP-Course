<?php
  if(isset($_POST['save_kategori'])){
    $nama_kategori = $koneksi->real_escape_string($_POST['nama_kategori']);
    if(empty($nama_kategori)){
      $_SESSION['error_msg']['add_kategori'] = "please fill all field!";
    }else{
    $query_check = $koneksi->query("SELECT * FROM tb_kategori WHERE nama_kategori='$nama_kategori'");
    if($query_check->num_rows == 0){
      $query_insert = $koneksi->query("INSERT INTO tb_kategori VALUES (NULL, '$nama_kategori')");
      if($query_insert){
        $_SESSION ['success_msg']['add_kategori'] = "Category <b>".$nama_kategori."</b> is successfully added!";
      }else{
        $_SESSION['error_msg']['add_kategori'] = "failed to add category";
      }
    }else{
      $_SESSION['error_msg']['add_kategori'] = "duplicate category!";
    }
    echo "<script>setTimeout(function(){
      location.href= 'index.php?menu=add_kategori'},1000);
    </script>";
    }
  }
  if(isset($_SESSION['success_msg']['add_kategori'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['success_msg']['add_kategori']?></strong>
    </div>
    <?php
  }else if(isset($_SESSION['error_msg']['add_kategori'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
    <strong><?= $_SESSION['error_msg']['add_kategori']?></strong>
    </div>
    <?php
  }
  unset($_SESSION['success_msg']['add_kategori']);
  unset($_SESSION['error_msg']['add_kategori']);
?>
<div class="col-lg-12">
   <div class="card">
       <div class="card-header d-flex align-items-center">
            <h2 class="h5 display">Tambah Kategori</h2>
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kategori" required>
                    </div>
                </div>
                <div class="line"></div>

                <div class="form-group row">
                    <div class="col-sm-4 offset-sm-2">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="save_kategori">Tambahkan Kategori</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>