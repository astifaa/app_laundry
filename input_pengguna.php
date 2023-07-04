<?php
session_start();
include "config/koneksi.php";
$username = $_POST['username'];
$query=mysqli_query($kon,"SELECT * FROM tb_user where username='$username'");
$cekbaris=mysqli_num_rows($query);



if ($cekbaris == 0 ) {

	

	$nama = $_POST['nama'];
	$id_outlet = $_POST['id_outlet'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$role = $_POST['role'];

	$query = mysqli_query($kon,"INSERT INTO tb_user VALUES (' ','$nama','$username','$password','$id_outlet','$role')");

	if ($query) {
		echo "<script>alert('Petugas Berhasil Di tambahkan!')</script>";
		echo "<script>document.location.href='pageAdmin.php?page=dataPengguna'</script>";

	}else{
		echo "<script>alert('Petugas Gagal Ditambahkan!')</script>";
		echo "<script>document.location.href='pageAdmin.php?page=dataPengguna'</script>";


	}




	
}else{
	echo "<script>alert('Username Sudah Ada!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataPengguna'</script>";
}


?>