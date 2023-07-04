<?php 


include '../config/koneksi.php';



$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];


$query =mysqli_query($kon,"UPDATE tb_outlet SET
	nama = '$nama',
	alamat = '$alamat',
	tlp = '$tlp'
	WHERE id = '$id'	

	");

if($query){
	$_SESSION['sukses'] = 'disimpan';
	echo "<script>document.location.href='../pageAdmin.php?page=dataOutlet'</script>";
}else{
	$_SESSION['gagal'] = 'gagal';
	echo "<script>document.location.href='../pageAdmin.php?page=dataOutlet'</script>";
}

?>


