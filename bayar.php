<?php 
	require_once "./lib/config.php";
	if(isset($_GET['action']) && isset($_GET['id'])){
		$id_pembelian = $_GET['id'];
		$query_update = $koneksi->query("UPDATE tb_pembelian SET status='Proses' WHERE id_pembelian=$id_pembelian");
		if ($query_update) {
			echo "<script>alert('Pesanan anda sedang di proses!')
			location.href = 'info.php';
			</script>";
		}
	}
 ?>