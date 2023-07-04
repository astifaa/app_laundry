<?php 


include '../config/koneksi.php';



$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$id_outlet = $_POST['id_outlet'];
$role = $_POST['role'];


$query =mysqli_query($kon,"UPDATE tb_user SET
	nama = '$nama',
	username = '$username',
	id_outlet = '$id_outlet',
	role = '$role'
	WHERE id = '$id'	

	");

if($query){
	$_SESSION['sukses'] = 'disimpan';
	echo "<script>document.location.href='../pageAdmin.php?page=dataUser'</script>";
}else{
	$_SESSION['gagal'] = 'gagal';
	echo "<script>document.location.href='../pageAdmin.php?page=dataUser'</script>";
}

?>


