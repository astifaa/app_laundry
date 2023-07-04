<?php 
include "config/koneksi.php";

if(isset($_GET['id_member']) != NULL){
	$_SESSION['id_member'] = $_GET['id_member'];
  //$_SESSION['id_transaksi'] = $_POST['id_transaksi'];
}else{
	$_SESSION['id_member'] = "0";
  //$_SESSION['id_transaksi'] = "0";
}
$sub_total = 0;
?>
<style type="text/css">
	.scroll{
		display: block;
		border: 1px solid black;
		padding: 5px;
		margin-top: 5px;
		width: 100%;
		height: 200px;
		overflow: auto;

	}

	.transaksi{
		width: 100%;
		/*height: 200px;*/
		float: right;

	}
	.transaksi .input{
		display: flex;
		width: 100%;
		align-items: center;
		justify-content: space-between;
	}
	.transaksi .input label:not(.txtTotal){
		width: 120px;
	}
	.tr{
		float: right;
		width: 300px;
		height: auto;
		text-align: left;
	}
	.tb{
		width: 250px;
	}

</style>
<div class="row"> 
	<div class = "col-12 col-md-4 bg-white">
		<p>  FORM MEMBER </p>
		<form action="simpan_pilih_paket.php" method="post">
			<?php 
			if (isset($_GET['id_member']) != NULL){
				$id_member['id_member'] = $_GET['id_member'];
				$data = mysqli_query($kon,"SELECT * FROM tb_member where id_member='$_GET[id_member]'");

				while ($m = mysqli_fetch_assoc($data)){

					?>
					<input type="text" class="form-control" name="id_member"  value="<?php echo $m['id_member'] ?>" hidden >

					<input type="text" class="form-control" name="id_user"  value="<?php echo $_SESSION['id_user'] ?>" hidden>

					<input type="text" class="form-control" name="status"  value="baru" hidden>

					<div class="form-group">
						<label for="" class="control-label">Nama</label>
						<input type="text" value="<?php echo $m['nama']?>" readonly class="form-control" id="nama" required name="nama">
					</div>


					<div class="form-group">
						<label for="" class="control-label">Alamat</label>
						<input type="text" class="form-control" id="alamat" required name="alamat" value="<?php echo $m['alamat']?>" readonly>
					</div>


					<div class="form-group">
						<label for="" class="control-label">Telepon</label>
						<input type="text" class="form-control" id="tlp" required name="tlp" value="<?php echo $m['tlp']?>" readonly>
					</div>

					<div class="form-group">
						<label for="" class="control-label">Pilih Outlet</label>
						<select class="form-control custom-select" id="id_outlet" name="id_outlet">
							<option></option>

						</select>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Pilih Paket</label>
						<select class="form-control custom-select" id="id_paket" name="id_paket">
							<option></option>

						</select>
					</div>

					<div class="form-group">
						<label for="" class="control-label">QTY</label>
						<input type="text" class="form-control" id="qty" required name="qty">
					</div>
					<div class="form-group">
						<label for="" class="control-label">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" required name="keterangan">
					</div>


					<div class="modal-footer">
						<button class="btn btn-danger waves-effect">Simpan</button>
						<!-- <input type="submit" class="btn btn-primary" value="Simpan"> -->
					</div> 
				<?php } } 

				else {
					echo "<p><br>&nbsp;&nbsp;&nbsp;Pilih Member Terlebih Dahulu</p>";
				}?>
			</form>
		</div>

		<div class = "col-12 col-md-8 bg-white">
			<p> TRANSAKSI </p>
			<?php
			if (isset($_GET['id_member']) != NULL){
				$id_member['id_member'] = $_GET['id_member'];
        //$id_transaksi['id_transaksi'] = $_GET['id_transaksi'];
				$no="1";

				$data = mysqli_query($kon,"
					SELECT * FROM 
					tb_transaksi JOIN tb_paket
					ON
					tb_paket.id_paket = tb_transaksi.id_paket
					JOIN tb_detail_transaksi
					ON
					tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi
					WHERE
					tb_transaksi.id_outlet = tb_paket.id_outlet 
					AND
					tb_transaksi.id_member = '$_SESSION[id_member]'

					");

					?>
					<div class ="scroll">
                <form method="post" action="simpan_transaksi.php">
						<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle">
							<thead><tr>
								<th>No.</th>
								<th>Nama Paket</th>
								<th>Keterangan</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Sub Total</th>
								<th>Opsi</th>
							</tr></thead>
							<?php
							$tmp = 0;
							$pajak = 0;

							while ($d = mysqli_fetch_array($data)){ 
								if ($d['status'] != 'proses' && $d['status'] != 'selesai' && $d['status'] != 'diambil') {
                # code...

									if ($d['qty'] != NULL) {
										$tmp = $d['qty'] * $d['harga'];

                    // menghitung semuanya
										$sub_total = $sub_total + $tmp;
										$pajak = ($sub_total * 3) / 100;
										$diskon = ($sub_total * $d['diskon'])/100;
										$bt = $d['biaya_tambahan'];

										$totalnya = $sub_total + $pajak  + $diskon + $bt;
									}

									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $d['nama_paket']; ?></td>
										<td><?php echo $d['keterangan']; ?></td>
										<td>
											<p>
												<?php echo 'Rp '.number_format($d['harga'],0,",",".");?>
											</p>
											<input type="hidden" name="" class="harga" value="<?php echo $d['harga']; ?>">
										</td>
										<td>
											<p name="qty" style="width: 50px; text-align: center;"><?php echo $d['qty']; ?></p>
										</td>
										<td>
											<input type="hidden" name="" id="subtotal" value="<?php echo $tmp ?>">
											<p><?php echo 'Rp '.number_format($tmp,0,",",".");?></p>
										</td>
										<?php 
										$link_delete = '<a class="btn btn-danger btn-sm" href="javascript:void:;" onclick="hapusPaket(\''.$d['id_transaksi'].'\')"><i class="fa fa-trash-alt"></i> </a>'; ?>
										<td align="center">
											<?php echo $link_delete; ?>

										</td>
									</tr>
								</tbody>

							<?php } }?>
						</table>
					</div>
					<div class ="transaksi mt-2">
						<input type="hidden" name="kode_invoice" value="<?php echo "KDINVOICE" ?>">
						<input type="hidden" name="tgl" value="<?php echo date('Y-m-d H:i:s') ?>">
						<input type="hidden" name="status" value="<?php echo $d['status'] ?>">
						<input type="hidden" name="tgl_bayar">

						<div class="input mt-2">
							<label for="" class="col-form-label">TOTAL</label>
							 <input type="hidden" name="sub_total" id="sub_total" value="<?php echo $sub_total ?>" style="width: 200px; float: right;">
                            <?php echo 'Rp '.number_format($sub_total,0,",",".");?>
						</div>
						<div class="input mt-2">
							<label for="" class="col-form-label">PAJAK (3%)</label>
							<input type="hidden" name="pajak" id="pajak" value="<?php echo $pajak ?>" style="width: 200px; float: right;">
                              <?php echo 'Rp '.number_format($pajak,0,",",".");?>
						</div>
						<div class="input mt-2">
							<label for="" class="col-form-label">BIAYA LAIN</label>
							 <input type="text" onkeyup="hitung_total()" name="biaya_tambahan" id="bt" class="form-control" style="width: 200px; float: right;">
						</div>
						<div class="input mt-2">
							<label for="" class="col-form-label">DISKON</label>
							<input type="text" onkeyup="hitung_total()" name="diskon" id="diskon" class="form-control" style="width: 200px; float: right;">
						</div>
						<div class="input mt-2">
							<label for="" class="col-form-label">TOTAL</label>
							<p id="total_semua"></p>
						</div>
						<div class="input mt-2">
							<label for="" class="col-form-label">PEMBAYARAN</label>
							<select name="dibayar" class="form-control" style="width: 200px">
                                <option>dibayar</option>
                                <option>belumbayar</option>
                              </select>
						</div>

						<div class="input mt-2">
							<label for="" class="col-form-label">BATAS WAKTU</label>
							 <div class="input-group date" id="reservationdate" data-target-input="nearest" style="width: 200px" name="batas_waktu">
                                <input type="text" class="form-control datetimepicker-input" name="batas_waktu" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
						</div>
						<div class="input mt-2">
							<a href="invoice-print.html" rel="noopener" class="btn btn-default "><i class="fas fa-print"></i> Cetak Transaksi</a>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan Transaksi</button>
						</div>
					</div>

				<?php } else {
					echo "<p><br>&nbsp;&nbsp;&nbsp;Pilih Member & Paket Terlebih Dahulu</p>";
				} ?>
			</div>		
		</div>
	</form>
	</div> 
	<div class = "col-12 col-md-12 bg-blue">
		<p> DATA MEMBER </p>

		<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
			<thead><tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>


				<th>Opsi</th>
			</tr></thead>
			<tbody>
				<?php 

				$no = 1;
				$query = "SELECT * FROM tb_member



				";
				$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
				while ($data = mysqli_fetch_assoc($sql_rm)) {
					$idb = $data['id_member'];
					?>
					<tr>
						<td align="center"><?php echo $no++; ?></td>
						<td ><?php echo $data['nama'] ?></td>
						<td><?php echo $data['alamat'] ?></td>
						<td><?php echo $data['tlp'] ?></td>
						<td align="center">
							<?php
							$link_pm = '<a class="tn btn-circle btn-sm btn-danger" href="javascript:void:;" onclick="pilihmember(\''.$data['id_member'].'\')"><i class="fa fa-check"></i> </a>';  

							echo $link_pm;
							?>

							<!-- <a id="pilihmember" class="btn btn-circle btn-sm btn-danger" name="hapus"><i class="fa fa-check"></i></a> -->
						</a>
					</td>
				</tr>


				<?php 
			}

			?>



		</tbody>
	</table>


</div> 
</div>
<script type="text/javascript">
	function pilihmember(id_member) {
      //fungsi confirm untuk memastikan user setuju.
      var cfm = confirm("Pilih member ini?");
      if (cfm) {
      	window.location.href='pageAdmin.php?page=Transaksi&id_member='+id_member;
      }
  }
   function hapusPaket(id_transaksi) {
      //fungsi confirm untuk memastikan user setuju.
      var cfm = confirm("Yakin hapus paket ini?");
      if (cfm) {
      	window.location.href='delete/h_paket.php?&id_transaksi='+id_transaksi;
      }
  }
</script>