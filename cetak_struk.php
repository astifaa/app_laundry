<?php
session_start();
//error_reporting(0);
include "config/koneksi.php";
include("mpdf/mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8','A7','10','arial');

ob_start();

?>
</style>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center mb-0">
					<b> A'Team LAUNDRY</b>
				</div>
				<p class="text-center" style="font-size: 10px">JL. RAYA NANJUNG</p></br>
				<hr style="border-style: double;" class ="mt-0 mb-1">
				<div class="panel">
					<p class ="mt-0" style="font-size: 10px">Detail Pesanan</p>   
					<div class="panel-body">
						<div class="table-responsive">
							<?php
							$no=1;
							$id_t = isset($_GET['id_transaksi']) ? (int) $_GET['id_transaksi'] : 0;

							$data = mysqli_query($kon,"
								SELECT * FROM 
								tb_transaksi JOIN tb_member ON
								tb_transaksi.id_member = tb_member.id_member
								JOIN tb_outlet ON
								tb_transaksi.id_outlet = tb_outlet.id_outlet
								JOIN tb_paket ON
								tb_transaksi.id_paket = tb_paket.id_paket
								JOIN tb_detail_transaksi ON
								tb_transaksi.id_transaksi = tb_detail_transaksi.id_transaksi 
								WHERE
								tb_transaksi.status = 'diambil' 
								AND tb_transaksi.id_transaksi = '$id_t'
								");
							if (empty($id_t)) {
								echo "kosong";
							} else {
							while($d = mysqli_fetch_array($data)){
							

								?>
								<table class="table" style="font-size: 10px">
									<tr>
										<td>Nama Member</td>
										<td> : </td>
										<td><?php echo $d['id_member']; ?></td>
									</tr>
									<tr>
										<td>Nama Outlet</td>
										<td> : </td>
										<td><?php echo $d['nama']; ?></td>
									</tr>
									<tr>
										<td>Nama Paket</td>
										<td> : </td>
										<td><?php echo $d['nama_paket']; ?></td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td> : </td>
										<td><?php echo $d['keterangan']; ?></td>
									</tr>
									<tr>
										<td>Harga Paket</td>
										<td> : </td>
										<td><?php echo 'Rp ' . number_format($d['harga']); ?></td>
									</tr>
									<tr>
										<td>Qty</td>
										<td> : </td>
										<td><?php echo $d['qty']; ?></td>
									</tr>
								</table>

								<hr class ="mt-0 mb-1">
								<table class="table" style="font-size: 10px">
									<?php
									$total_paket = $d['qty']*$d['harga'];
									$total = $total_paket+$d['biaya_tambahan']+$d['pajak']+$d['diskon'];
									?>
									<tr>
										<td>Total Harga Paket</td>
										<td>Rp</td>
										<td style="text-align: right;"><?php echo number_format($total_paket); ?></td>
									</tr>
									<tr>
										<td>Biaya Tambahan</td>
										<td>Rp</td>
										<td style="text-align: right;"><?php echo number_format($d['biaya_tambahan']); ?></td>
									</tr>
									<tr>
										<td>Pajak 5%</td>
										<td>Rp</td>
										<td style="text-align: right;"><?php echo number_format($d['pajak']); ?></td>
									</tr>
									<tr>
										<td>Diskon</td>
										<td>Rp</td>
										<td style="text-align: right;"><?php echo number_format($d['diskon']); ?></td>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td><hr class="mt-1"></td>
									</tr>
									<tr>>
										<td></td>
										<td>Total</td>
										<td style="text-align: right;"><?php echo number_format($total); ?></td>
									</tr>
								</table>
								<div class="co-12 bg-light mt-5" style="font-size: 8px; text-align: center;">
									<i>
										* Telah dibayar pada tanggal <?php echo $d['tgl_bayar']; ?> *</i>
									</div>

								<?php } }?>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<?php
	$html = ob_get_contents();
	ob_end_clean();

//==============================================================
//==============================================================
//==============================================================




	$mpdf->SetHTMLHeader($header);

	$mpdf->SetHTMLFooter($footer);

//$mpdf->SetDisplayMode('fullpage');
	$mpdf->AddPage('P','','','','',5,5,5,5,0,0);
	$mpdf->SetTitle("Struk Laundry");
	$mpdf->SetAuthor("sriOcta");
	$mpdf->SetKeywords("Invoice");
	$mpdf->SetSubject("Struk Laundry");
	$mpdf->SetCreator("admin@gmail.com");

	// $mpdf->SetWatermarkImage('../assets/img/mas.jpg/'.$infobis['logo_bisnis'], 0.1, 'D', array(100,100));
	// $mpdf->showWatermarkImage = true;
//$mpdf->SetWatermarkText("Kelurahan");
//$mpdf->showWatermarkText = true;
//$mpdf->watermarkTextAlpha = 0.1;

	//$stylesheet = file_get_contents('vendor/bootstrap.min.css');
	$mpdf->WriteHTML($stylesheet,1);
	$mpdf->WriteHTML($html,2);

	$mpdf->Output('StrukLaundry '.$id_transaksi.'.pdf','I');
	exit;
//==============================================================
//==============================================================
//==============================================================


	?>