<!-- <?php 
	// $id_detail = $_GET['id'];
 ?> -->
<link rel="stylesheet" type="text/css" href="../css/tables.css">
<div class="col-lg-12">
	<h3>Dashboard Pelanggan</h3>
	<div class="card-header d-flex align-items-center">
		<h2 class="h5 display">List Pelanggan</h2>
	</div>
	<div class="card-body">
		<table class="table table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th>#No</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Level User</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$nomor = 0;
					$query_user = $koneksi->query("SELECT * FROM tb_user");
					while ($data = $query_user->fetch_assoc()) {
						?>
						<tr>
							<td scope="row"><?= ++$nomor?></td>
							<td><?= $data['nama_user']?></td>
							<td><?= $data['email_user']?></td>
							<td><?= $data['telepon_user']?></td>
							<td><?= $data['level_user']?></td>
						</tr>
						<?php
					}
				 ?>
			</tbody>
		</table>
	</div>
</div>