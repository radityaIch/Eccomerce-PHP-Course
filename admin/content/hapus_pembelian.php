<?php 
// require_once '../lib/config.php';
	if(isset($_GET['id'])){
        $id_pembelian = $_GET['id'];
        $query_check = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_pembelian = id_pembelian");
        if($query_check->num_rows > 0){
            $data_produk = $query_check->fetch_assoc();
            $query_delete = $koneksi->query("DELETE FROM tb_pembelian WHERE id_pembelian = $id_pembelian");
            }


            if($query_delete){
                $_SESSION['success_msg']['hapus_pembelian'] = 'Successfully deleted!';
                header('location: index.php?menu=pembelian');
            }
            else{
                $_SESSION['error_msg']['hapus_pembelian'] = 'failed to delete';
                header('location: index.php?menu=pembelian');
            }
        }
        else{
            $_SESSION['error_msg']['hapus_pembelian'] = 'something error!';
            header('location: index.php?menu=pembelian');
        }
   
?>
 ?>