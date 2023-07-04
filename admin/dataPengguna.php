 

<?php 
include './config/koneksi.php';


?>





<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>

</div>






<!-- KODING DISNI -->


<div class="row">
	<div class="col-lg-12">
		<button class="btn mb-3 invert" style="background-color: #4B0080; color: #FFFFFF"  data-toggle="modal" data-target="#tambah_pengguna"><i class="fas fa-plus fa-sm"></i> Tambah Data Pengguna
		</button>
		<a href="laporan/laporan_barang_masuk.php" type="button" class="btn btn-success" target="_BLANK" style=" float: right; "><i class="fa  fa-download"></i> Print </a>
	</div></div>




	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
					<thead><tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Role</th>
						
						<th>Opsi</th>
					</tr></thead>
					<tbody>
						<?php 

						$no = 1;
						$query = "SELECT * FROM tb_user
						JOIN tb_outlet ON tb_outlet.id = tb_user.id_outlet
						


						";
						$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
						while ($data = mysqli_fetch_array($sql_rm)) {
							$idb = $data['id'];
							?>
							<tr>
								<td align="center"><?php echo $no++; ?></td>
								<td ><?php echo $data['nama'] ?></td>
								<td><?php echo $data['username'] ?></td>
								<td><?php echo $data['alamat'] ?></td>
								<td><?php echo $data['tlp'] ?></td>
								<td><?php echo $data['role']?></td>
								



								<td align="center">



									<a href="delete/delete_barang_masuk.php?id_barang_masuk=<?php echo $data['id_barang_masuk'] ?>" id="btn-hapus" >
										<button class="btn btn-circle btn-sm btn-danger" name="hapus"><i class="fa fa-trash"></i></button>
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
	</div>






	<div id="tambah_pengguna" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">FORM TAMBAH PENGGUNA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" id="modal-edit">

					<form class="" method="post" action="./input_pengguna.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="" class="control-label">Nama</label>
							<input type="text" class="form-control" id="nama" required name="nama">
						</div>



						<div class="form-group">
							<label for="" class="control-label">Username</label>
							<input type="text" class="form-control" id="username" required name="username">
						</div>


						<div class="form-group">
							<label for="" class="control-label">Password</label>
							<input type="text" class="form-control" id="password" required name="password">
						</div>


						<div class="form-group">
							<label>Pilih ID Member</label>
							<select name="id_outlet" class="custom-select form-control">
								<option selected >Pilih ID Member</option>
								<?php
								$supp=mysqli_query($kon,"select * from tb_outlet");
								while($s=mysqli_fetch_array($supp)){
									?>
									<option value="<?php echo $s['id'] ?>"><?php echo $s['nama'] ?></option>
									<?php
								}
								?>
							</select>
						</div>


						<div class="form-group">
							<label for="" class="control-label">Pilih Role</label>
							<select class="control-label form-control" name="role">

								<option>admin</option>
								<option>kasir</option>
							</select>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="input_pengguna" value="save">
					</form>
				</div>

			</div>
		</div>
	</div>