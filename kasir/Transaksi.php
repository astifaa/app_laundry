<?php include "config/koneksi.php";
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
<div class = "row"> 
	<div class = "col-12 col-md-4 bg-white">
		<p>  FORM MEMBER </p>
		<form class="" method="post" action="./input_member.php" enctype="multipart/form-data">

			<div class="form-group">
				<label for="" class="control-label">Nama</label>
				<input type="text" class="form-control" id="nama" required name="nama">
			</div>


			<div class="form-group">
				<label for="" class="control-label">Alamat</label>
				<input type="text" class="form-control" id="alamat" required name="alamat">
			</div>


			<div class="form-group">
				<label for="" class="control-label">Telepon</label>
				<input type="number" class="form-control" id="tlp" required name="tlp">
			</div>

			<div class="form-group">
				<label for="" class="control-label">Pilih Paket</label>
				<select class="form-control">
					<option>pilih</option>
				</select>
			</div>

			<div class="form-group">
				<label for="" class="control-label">QTY</label>
				<input type="number" class="form-control" id="tlp" required name="tlp">
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" name="input_pengguna" value="Simpan">
			</form>
		</div> 
	</div>
	<div class = "col-12 col-md-8 bg-white">
		<p> TRANSAKSI </p>
		<div class ="scroll">
			<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
				<thead><tr>
					<th>No.</th>
					<th>Nama Paket</th>
					<th>Keterangan</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Sub Total</th>
					
					
					<th>Opsi</th>
				</tr></thead>
				<tbody>
					



				</tbody>
			</table>
		</div>
		<div class ="transaksi mt-2">
			
			<div class="input mt-2">
				<label for="" class="col-form-label">TOTAL</label>
				<label class="txtTotal">Rp. 75983457934</label>
			</div>
			<div class="input mt-2">
				<label for="" class="col-form-label">PAJAK</label>
				<input type="text" class="form-control" id="nama" required name="nama">
			</div>
			<div class="input mt-2">
				<label for="" class="col-form-label">BIAYA LAIN</label>
				<input type="text" class="form-control" id="nama" required name="nama">
			</div>
			<div class="input mt-2">
				<label for="" class="col-form-label">DISKON</label>
				<input type="text" class="form-control" id="nama" required name="nama">
			</div>
		</div></div>		
	</div>
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
			$query = "SELECT * FROM tb_outlet
			


			";
			$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
			while ($data = mysqli_fetch_array($sql_rm)) {
				$idb = $data['id'];
				?>
				<tr>
					<td align="center"><?php echo $no++; ?></td>
					<td ><?php echo $data['nama'] ?></td>
					<td><?php echo $data['alamat'] ?></td>
					<td><?php echo $data['tlp'] ?></td>
					
					



					<td align="center">



						
						<button class="btn btn-circle btn-sm btn-danger" name="hapus"><i class="fa fa-check"></i></button>
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