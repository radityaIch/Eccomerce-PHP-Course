<?php
    if(isset($_GET['menu'])){
        if($_GET['menu'] == 'kategori'){
            // echo "<h1>Menu Kategori</h1>";
            require_once "content/show_kategori.php";

        }else if($_GET['menu'] == 'add_kategori'){
            require_once "content/add_kategori.php";
        }else if($_GET['menu'] == 'delete_kategori' && isset ($_GET['id'])){
            require_once "content/delete_kategori.php";
        }else if($_GET['menu'] == 'edit_kategori' && isset ($_GET['id'])){
            require_once "content/edit_kategori.php";
        }else if($_GET['menu'] == 'produk'){
            // echo "<h1>Menu Produk</h1>";
            require_once "content/show_produk.php";
        }else if($_GET['menu'] == 'add_produk'){
            // echo "<h1>Menu Produk</h1>";
            require_once "content/add_produk.php";
        }else if($_GET['menu'] == 'rating'){
            // echo "<h1>Menu Produk</h1>";
            require_once "content/rating.php";
        }else if($_GET['menu'] == 'pembelian'){
            // echo "<h1>Menu Pembelian</h1>";
            require_once "content/show_pembelian.php";
        }else if($_GET['menu'] == 'detail_pembelian'){
            //echo "<h1>Menu Pembelian</h1>";
            require_once "content/show_detail_pembelian.php";
        }else if($_GET['menu'] == 'konfirmasi_pembelian'){
            //echo "<h1>Menu Pembelian</h1>";
            require_once "content/konfirmasi_pembelian.php";
        }else if($_GET['menu'] == 'pelanggan'){
            // echo "<h1>Menu Pelanggan</h1>";
            require_once "content/show_pelanggan.php";
        }else if($_GET['menu'] == 'edit_produk' && isset ($_GET['id'])){
            require_once "content/edit_produk.php";
        }else if($_GET['menu'] == 'delete_produk' && isset ($_GET['id'])){
            require_once "content/delete_produk.php";
        }else if($_GET['menu'] == 'hapus_pembelian' && isset ($_GET['id'])){
            require_once "content/hapus_pembelian.php";
        }else{
            header('location: index.php');
        }
    }else{
        echo "<h1>Bukan Halaman Menu</h1>";
    }
?>