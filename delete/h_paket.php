<?php
session_start();
include '../config/koneksi.php';
$id = $_GET['id_transaksi'];
$query = mysqli_query($kon, "DELETE FROM tb_transaksi WHERE id_transaksi = '$id' ");
if ($query) {
	echo "<script> alert ('Selamat!! Data Berhasil Di Hapus');</script>";
	echo "<script>document.location.href='../pageAdmin.php?page=Transaksi'</script>";
}else {
	echo "</script>alert('Maaf!! Data Masih Terhubung Dengan Data Yang Lain');</script>";
	echo "<script>document.location.href='../pageAdmin.php?page=Transaksi'</script>";
}