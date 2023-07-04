<?php
	include '../config/koneksi.php';

	echo "<option value=''>Pilih Outlet</option>";

	$query = "SELECT * FROM tb_outlet ORDER BY nama ASC";
	$dewan1 = $kon->prepare($query);
	$dewan1->execute();
	$res1 = $dewan1->get_result();
	while ($row = $res1->fetch_assoc()) {
		echo "<option value='" . $row['id_outlet'] . "'>" . $row['nama'] . "</option>";
	}
?>