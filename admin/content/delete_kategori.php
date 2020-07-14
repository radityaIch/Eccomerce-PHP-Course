<?php
    if(isset($_GET['id'])){
        $id_kategori = $_GET['id'];
        $query_check = $koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori = id_kategori");
        if($query_check->num_rows > 0){
            $query_delete = $koneksi->query("DELETE FROM tb_kategori WHERE id_kategori = $id_kategori");
            if($query_delete){
                $_SESSION['success_msg']['delete_kategori'] = 'Category successfully deleted!';
                header('location: index.php?menu=kategori');
            }else{
                $_SESSION['error_msg']['delete_kategori'] = 'failed to delete the category';
                header('location: index.php?menu=kategori');
            }
        }else{
            $_SESSION['error_msg']['delete_kategori'] = 'something error!';
            header('location: index.php?menu=kategori');
        }
    }else{
        header('location: index.php?menu_kategori');
    }
?>