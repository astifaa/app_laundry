<?php 


include '../config/koneksi.php';



$id = (int)$_POST['id'];
$id_outlet = (int)$_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = (int)$_POST['harga'];
$query = "UPDATE tb_paket SET
id_outlet = '$id_outlet',
jenis = '$jenis',
nama_paket = '$nama_paket',
harga = '$harga' 
WHERE id = '$id'
";

$query =mysqli_query($kon,$query);

if($query){
	$_SESSION['sukses'] = 'disimpan';
	echo "<script>document.location.href='../pageAdmin.php?page=dataPaket'</script>";
	echo 'berhasil';
}else{
	// $_SESSION['gagal'] = 'gagal';
	// echo "<script>document.location.href='../pageAdmin.php?page=dataPaket'</script>";
	echo $query;
	echo mysqli_error($kon);
}

?>


