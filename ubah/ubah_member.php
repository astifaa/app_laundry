<?php 


include '../config/koneksi.php';



$id = $_POST['id'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];


$query =mysqli_query($kon,"UPDATE tb_member SET
	nama = '$nama',
	alamat = '$alamat',
	jenis_kelamin = '$jenis_kelamin',
	tlp = '$tlp'
	WHERE id = '$id'	

	");

if($query){
	$_SESSION['sukses'] = 'disimpan';
	echo "<script>document.location.href='../pageAdmin.php?page=dataMember'</script>";
}else{
	$_SESSION['gagal'] = 'gagal';
	echo "<script>document.location.href='../pageAdmin.php?page=dataMember'</script>";
}

?>


