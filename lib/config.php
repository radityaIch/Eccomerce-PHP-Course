<?php
    session_start();
    $host = 'localhost';
    $username = 'root';
    $password = 'root1234';
    $db_name = '2a_ecommerce';

    @$koneksi = new mysqli($host, $username, $password, $db_name);
    if($koneksi->connect_error){
        die('Error : '.$koneksi->connect_error);
    }else{
        // echo "Sukses!";
    }
    if(!isset($_SESSION['grand_total'])){
        $_SESSION['grand_total'] = 0;
    }
?>