 

<?php 
include './config/koneksi.php';


?>





<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Paket </h1>

</div>






<!-- KODING DISNI -->


<div class="row">
	<div class="col-lg-12">
		<button class="btn mb-3 invert" style="background-color: #4B0080; color: #FFFFFF"  data-toggle="modal" data-target="#tambah_pengguna"><i class="fas fa-plus fa-sm"></i> Tambah Data Paket
		</button>
		




		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
						<thead><tr>
							<th>ID Outlet</th>
							<th>Jenis</th>
							<th>Nama Paket</th>
							<th>Harga</th>

							<th>Opsi</th>
						</tr></thead>
						<tbody>
							<?php 

							$no = 1;
							$query = "SELECT * FROM tb_paket";
							$queryOutlet = "SELECT id FROM tb_outlet";

							$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
							while ($data = mysqli_fetch_array($sql_rm)) {
								$idb = $data['id_paket'];
								?>
								<tr>

									<td ><?php echo $data['id_outlet'] ?></td>
									<td><?php echo $data['jenis'] ?></td>
									<td><?php echo $data['nama_paket'] ?></td>
									<td><?php echo number_format($data['harga']) ?></td>




									<td align="center">



										<a href="delete/delete_paket.php?id=<?php echo $data['id'] ?>" id="btn-hapus" >
											<button class="btn btn-circle btn-sm btn-danger" name="hapus"><i class="fa fa-trash"></i></button>
										</a>

										<button data-toggle="modal" class="btn btn-circle btn-sm btn-info" data-target="#edit<?=$idb;?>" ><i class="fas fa-edit" ></i></button>
									</a>

									<div id="edit<?=$idb;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">

												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">FORM EDIT MEMBER</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>
												<div class="modal-body" id="modal-edit">

													<form class="" method="post" action="./ubah/ubah_paket.php" enctype="multipart/form-data">

														<div class="form-group">
															<label for="" class="control-label">ID</label>
															<input type="text" class="form-control" id="id" required name="id" value="<?php echo $data['id']; ?>" readonly="readonly"style="color: red;">
														</div>

														<div class="form-group">
															<label for="" class="control-label">ID Outlet</label>
															<input type="text" class="form-control" id="id_outlet" required name="id_outlet" value="<?php echo $data['id_outlet']; ?>" readonly="readonly"style="color: red;">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Jenis </label>
															<input type="text" class="form-control" id="jenis" required name="jenis" value="<?php echo $data['jenis'] ?>">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Nama Paket</label>
															<input type="text" class="form-control" id="nama_paket" required name="nama_paket" value="<?php echo $data['nama_paket'] ?>">
														</div>


														<div class="form-group">
															<label for="nama_barang" class="control-label">Harga</label>
															<input type="text" class="form-control" id="harga" required name="harga" value="<?php echo $data['harga'] ?>">
														</div>



													</div>
													<div class="modal-footer">
														<button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
														<input type="submit" class="btn btn-primary" name="ubah_paket" value="Simpan">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
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
					<h4 class="modal-title" id="myModalLabel">FORM TAMBAH PAKET</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" id="modal-edit">

					<form class="" method="post" action="input_paket.php" enctype="multipart/form-data">


						<div class="form-group">
							<label>Pilih Jenis</label>
							<select name="jenis" class="custom-select form-control">
								<option selected >Pilih Jenis</option>
								<option value="kiloan"> kiloan </option>
								<option value="selimut"> selimut </option>
								<option value="bed_cover"> bed_cover </option>
								<option value="kaos"> kaos </option>
								<option value="lain"> lain </option>
							</select>
						</div>


						<div class="form-group">
							<label for="" class="control-label">Nama Paket</label>
							<input type="text" class="form-control" id="nama_paket" required name="nama_paket">
						</div>

						<div class="form-group">
							<label for="" class="control-label">Harga</label>
							<input type="text" class="form-control" id="harga" required name="harga">
						</div>


						<div class="form-group">
							<label>Pilih ID Outlet</label>
							<select name="id_outlet" class="custom-select form-control">
								<option selected >Pilih ID Outlet</option>
								<?php
								$supp=mysqli_query($kon,"select * from tb_outlet");
								while($s=mysqli_fetch_array($supp)){
									?>
									<option value="<?php echo $s['id_outlet'] ?>"><?php echo $s['id_outlet'] ?></option>
									<?php
								}
								?>
							</select>
						</div>



						<div class="modal-footer">
							<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="input_paket" value="save">
						</form>
					</div>

				</div>
			</div>
		</div>