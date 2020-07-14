<?php 
	require_once '../lib/config.php';
 ?>
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<div class=row>
<?php 
                            if (isset($_SESSION['success_msg']['hapus_pembelian'])){
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                          <strong><?= $_SESSION['success_msg']['hapus_pembelian'] ?></strong> 
                          </div>
                      <?php
                            }
                            elseif (isset($_SESSION['error_msg']['hapus_pembelian'])) {
                              ?>
                               <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:100%">
                               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                              </button>
                              
                          <strong><?= $_SESSION['error_msg']['hapus_pembelian'] ?></strong>
                            </div>
                           <?php
                            }
                            unset($_SESSION['success_msg']['hapus_pembelian']);
                            unset($_SESSION['error_msg']['hapus_pembelian']);
                           ?>
</div>
<div class="col-lg-12">
	<h3>Pembelian Dashboard</h3>
	<div class="card-header d-flex align-items-center">

		<h2 class="h5 display">List Pembelian</h2>
	</div>
	<div class="card-body">
		<table class="table table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th>#No</th>
					<th>Customer Name</th>
					<th>Date</th>
					<th>Grand Total</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$nomor = 0;
					$query_pembelian = $koneksi->query("SELECT * FROM tb_pembelian INNER JOIN tb_user ON tb_user.id_user = tb_pembelian.id_pelanggan");
					while ($data = $query_pembelian->fetch_assoc()) {
						?>
						<tr>
							<td scope="row"><?= ++$nomor?></td>
							<td><?=$data['nama_user']?></td>
							<td><?=$data['tanggal_pembelian']?></td>
							<td>Rp. <?= number_format($data['total_pembelian'])?></td>
							<td><?=$data['status']?></td>
							<td><a href="index.php?menu=detail_pembelian&id=<?= $data['id_pembelian']?>"><button class="btn btn-primary">Detail</button></a>
								<?php 
									if ($data['status'] == 'Proses') {
										?>
										<a href="index.php?menu=konfirmasi_pembelian&id=<?= $data['id_pembelian']?>"><button class="btn btn-primary">Konfirmasi</button>
										<?php
									}
									else if($data['status'] == 'Lunas'){
										?>
										<a href="index.php?menu=hapus_pembelian&id=<?= $data['id_pembelian']?>"><button class="btn btn-danger">Hapus</button></a>
										<?php
									}
								 ?>
							</td>
						</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>