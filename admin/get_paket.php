<?php
	include '../config/koneksi.php';
	$id_outlet = $_POST['id_outlet'];
	//$i = $_GET['id_outlet'];

	echo "<option value=''>Pilih Paket</option>";

	$query = "SELECT * FROM tb_paket WHERE id_outlet = ? ORDER BY nama_paket ASC";
	$dewan1 = $kon->prepare($query);
	$dewan1->bind_param("i", $id_outlet);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_paket'] . "'>" . $row['jenis'] . " - " . $row['nama_paket']."</option>";
	}
?>