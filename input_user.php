<?php
session_start();
include "config/koneksi.php";




$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];

$query = mysqli_query($kon,"INSERT INTO tb_user VALUES (null,'$nama','$username','$password','$id_outlet','$role')");

if ($query) {
	echo "<script>alert('Berhasil Di tambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataUser'</script>";

}else{
	echo "<script>alert('Gagal Ditambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataUser'</script>";
}




?>