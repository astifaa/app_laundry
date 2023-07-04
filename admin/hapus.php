<?php
    //session_start();
    include '../config/koneksi.php';
    // $id = isset($_GET['id']) ? $_GET['id'];
    // if (isset($_GET['id']) != NULL) {
    // 	$id['id']=$_GET['id'];
    // 	echo "ADa";
    // } else {
    // 	echo "kosong";
    // }

    $id = $_GET['id'];
    
    $query = mysqli_query($kon, "delete from tb_outlet where id='$id' ");

    if ($query) {
    	echo "<script> alert ('Selamat!! Data Berhasil Di Hapus');document.location.href='../pageAdmin.php?page=dataOutlet';</script>";
    }else {
    	echo "</script>alert('Maaf!! Data Masih Terhubung Dengan Data Yang Lain'); document.localtion.href='dataOutlet.php';</script>";
    }

    ?>