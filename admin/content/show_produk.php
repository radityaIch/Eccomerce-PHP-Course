<link rel="stylesheet" type="text/css" href="../css/table.css">
<div class="row">
   <?php 
                            if (isset($_SESSION['success_msg']['delete_produk'])){
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                          <strong><?= $_SESSION['success_msg']['delete_produk'] ?></strong> 
                          </div>
                      <?php
                            }
                            elseif (isset($_SESSION['error_msg']['delete_produk'])) {
                              ?>
                               <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%">
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                              </button>
                              
                          <strong><?= $_SESSION['error_msg']['delete_produk'] ?></strong>
                            </div>
                           <?php
                            }
                            unset($_SESSION['success_msg']['delete_produk']);
                            unset($_SESSION['error_msg']['delete_produk']);
                           ?>
	<div class="col-lg-12">
		<a href="?menu=add_produk" class="float-right">
			<button class="btn btn-primary">Add product</button>
		</a>
	</div>
</div>
<div class="col-lg-12">
	<h3>product Dashboard</h3>
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h2 class="h5 display">List of product</h2>
		</div>
		<div class="card-body">
      <table class="table table-striped table-hover table-responsive">
          <thead>
              <tr>
                <th>#No</th>
                <th>product name</th>
                <th>Price</th>
                <th>Weight</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
                     <?php
                     $nomor = 1; 
                      $query_produk = $koneksi->query("SELECT * FROM tb_produk");
                      if ($query_produk->num_rows > 0) {
                        while($data_produk = $query_produk->fetch_assoc()){
                          ?>
                           <tr>
                        <th scope="row"><?=$nomor++?></th>
                        <td><?=$data_produk['nama_produk']?></td>
                        <td>Rp.<?=number_format($data_produk['harga_produk'],0,",",".")?></td>
                        <td><?=($data_produk['berat_produk']
                        )/100?> kg</td>
                        <td>
                          <img src="../product_image/<?=$data_produk['foto_produk']?>" width="100px">
                        </td>
                        <td>
                              <a href="index.php?menu=edit_produk&id=<?= $data_produk['id_produk'] 
                               ?>">
                                <button class="btn btn-info btn-sm">Edit</button>
                              </a>

                              <a href="index.php?menu=delete_produk&id=<?= $data_produk['id_produk'] 
                               ?>">
                                <button class="btn btn-danger btn-sm">Delete</button>
                              </a>
                        </td>
                      </tr>
                      <?php
                        }
                      }
                      else{
                        ?>
                         <tr>
                           <td colspan="6" class="text-center">
                            <h1>Tidak Ada Data</h1>
                           </td>
                        </tr>
                        <?php  
                      }
                      ?>
                 
          </tbody>
      </table>