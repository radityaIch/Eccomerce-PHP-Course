<?php 
	session_start();
	if(!isset($_SESSION['user_login'])){
		header('location: login.php');
	}
	else{
		$id_produk = $_GET['id'];
		if (isset($_SESSION['keranjang_belanja'][$id_produk])) {
			$_SESSION['keranjang_belanja'][$id_produk] ++;
		}
		else{
			$_SESSION['keranjang_belanja'][$id_produk] = 1;
		}
		if(isset($_GET['clear'])){
			unset($_GET['keranjang_belanja']);
			unset($_GET['grand_total']);
		}
		header('location: cart.php');
	}
 ?>