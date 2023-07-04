<?php
session_start();
include "config/koneksi.php";




$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];


$query = mysqli_query($kon,"INSERT INTO tb_member VALUES ('0','$nama','$alamat','$jenis_kelamin','$tlp')");

if ($query) {
	echo "<script>alert('Berhasil Di tambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataMember'</script>";

}else{
	echo "<script>alert('Gagal Ditambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataMember'</script>";
}




?>