<?php 
	if (isset($_GET['id'])) {
	 $id_pembelian = $_GET['id'];
	 $query_update = $koneksi->query("UPDATE tb_pembelian SET status='Lunas' WHERE id_pembelian=$id_pembelian");
	 if ($query_update) {
	 	echo "<script>
	 			alert('Berhasil mengkonfirmasi pembelian');location.href = 'index.php?menu=pembelian'</script>";
	 }
	}
 ?>