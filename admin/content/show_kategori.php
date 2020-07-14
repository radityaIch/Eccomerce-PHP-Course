<link rel="stylesheet" type="text/css" href="../css/table.css">
<div class="row">
                          <?php 
                          	if (isset($_SESSION['success_msg']['delete_kategori'])){
                          	?>
                          	<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         	 <span aria-hidden="true">&times;</span>
                       		 </button>
                        	<strong>Success Message</strong> 
                      		</div>
                      <?php
                          	}
                          	elseif (isset($_SESSION['error_msg']['delete_kategori'])) {
                          		?>
                          		 <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%">
                       				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        		 	 <span aria-hidden="true">&times;</span>
                        			</button>
                       			 	<strong>Error Message</strong>
                    			  </div>
                    			 <?php
                          	}
                          	unset($_SESSION['success_msg']['delete_kategori']);
                          	unset($_SESSION['error_msg']['delete_kategori']);
                           ?>
                           
	<div class="col-lg-12">
		<a href="?menu=add_kategori" class="float-right">
			<button class="btn btn-primary">Add Category</button>
		</a>
	</div>
</div>
<div class="col-lg-12">
	<h3>Category Dashboard</h3>
	<div class="card">
		<div class="card-header d-flex align-items-center">
			<h2 class="h5 display">List of Category</h2>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover table-responsive">
				<thead>
					<tr>
						<th>#No</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
								<?php
									$query_kategori= $koneksi->query("SELECT * FROM tb_kategori");
									if($query_kategori->num_rows > 0){
										$nomor = 1;
										while($data_kategori = $query_kategori->fetch_assoc()){
											// var_dump($data_kategori['nama_kategori']);
											?>
												<tr>
													<th scope="row"><?= $nomor?></th>
													<td><?= $data_kategori['nama_kategori']?></td>
													<td>
													<a href="index.php?menu=edit_kategori&id=<?= $data_kategori['id_kategori']?>"><button class="btn btn-info">Edit</button></a>
													<a href="index.php?menu=delete_kategori&id=<?= $data_kategori['id_kategori']?>"><button class="btn btn-danger">Delete</button></a>
													</td>
												</tr>
											<?php
											$nomor++;
										}
									}else if($query_kategori->num_rows == 0){
										?>
											<td colspan="3" class="text-center">
											<h1>Tidak Ada Data</h1>
											</td>
										<?php
									}
								?>
				</tbody>
			</table>
		</div>
	</div>
</div>