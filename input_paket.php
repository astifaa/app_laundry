<?php
session_start();
include "config/koneksi.php";




$id_outlet = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];


$query = mysqli_query($kon,"INSERT INTO tb_paket (id_outlet,jenis,nama_paket,harga)VALUES ('$id_outlet','$jenis','$nama_paket','$harga')");

if ($query) {
	echo "<script>alert('Berhasil Di tambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataPaket'</script>";

}else{
	echo "<script>alert('Gagal Ditambahkan!')</script>";
	echo "<script>document.location.href='pageAdmin.php?page=dataPaket'</script>";
}





?>