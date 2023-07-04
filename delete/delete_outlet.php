<?php
session_start();
include '../config/koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($kon, "DELETE FROM tb_outlet WHERE id = '$id' ");
if ($query) {
    echo "<script> alert ('Selamat!! Data Berhasil Di Hapus');</script>";
    echo "<script>document.location.href='../pageAdmin.php?page=dataOutlet'</script>";
}else {
    echo "</script>alert('Maaf!! Data Masih Terhubung Dengan Data Yang Lain');</script>";
    echo "<script>document.location.href='../pageAdmin.php?page=dataOutlet'</script>";
}