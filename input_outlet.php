<?php
session_start();
include "config/koneksi.php";




$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];


$query = mysqli_query($kon,"INSERT INTO tb_outlet VALUES (' ','$nama','$alamat','$tlp')");

if ($query) {
	echo "<script>alert('Berhasil Di tambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataOutlet'</script>";

}else{
	echo "<script>alert('Gagal Ditambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataOutlet'</script>";
}




?>