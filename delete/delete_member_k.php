<?php
session_start();
include '../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($kon, "DELETE FROM tb_member WHERE id = '$id' ");
if ($query) {
	echo "<script> alert ('Selamat!! Data Berhasil Di Hapus');</script>";
	echo "<script>document.location.href='../pageKasir.php?page=dataMember'</script>";
}else {
	echo "</script>alert('Maaf!! Data Masih Terhubung Dengan Data Yang Lain');</script>";
	echo "<script>document.location.href='../pageKasir.php?page=dataMember'</script>";
}