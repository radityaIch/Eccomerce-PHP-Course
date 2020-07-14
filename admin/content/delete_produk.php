<?php
    if(isset($_GET['id'])){
        $id_produk = $_GET['id'];
        $query_check = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk = id_produk");
        if($query_check->num_rows > 0){
            $data_produk = $query_check->fetch_assoc();
            $query_delete = $koneksi->query("DELETE FROM tb_produk WHERE id_produk = $id_produk");
            $foto_lama = $data_produk['foto_produk'];

            if(file_exists("../product_image/$foto_lama")){
                unlink("../product_image/$foto_lama");
            }


            if($query_delete){
                $_SESSION['success_msg']['delete_produk'] = 'Product successfully deleted!';
                header('location: index.php?menu=produk');
            }else{
                $_SESSION['error_msg']['delete_produk'] = 'failed to delete the product';
                header('location: index.php?menu=produk');
            }
        }
        else{
            $_SESSION['error_msg']['delete_produk'] = 'something error!';
            header('location: index.php?menu=produk');
        }
    }else{
        header('location: index.php?menu_produk');
    }
?>