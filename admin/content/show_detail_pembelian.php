<?php 
	$id_detail = $_GET['id'];
	require_once '../lib/config.php';
 ?>
<link rel="stylesheet" type="text/css" href="../css/tables.css">
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
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$nomor = 0;
					$query_pembelian = $koneksi->query("SELECT * FROM tb_pembelian_produk INNER JOIN tb_produk ON tb_pembelian_produk.id_produk = tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian = $id_detail");
					while ($data = $query_pembelian->fetch_assoc()) {
						$Subtotal = $data['harga_produk'] * $data['jumlah'];
						?>
						<tr>
							<td scope="row"><?= ++$nomor?></td>
							<td><?=$data['nama_produk']?></td>
							<td><?=number_format($data['harga_produk'])?></td>
							<td><?=$data['jumlah']?></td>
							<td>Rp. <?= number_format($Subtotal)?></td>
							<td>
							
							</td>
						</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>