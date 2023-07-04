 

<?php 
include 'config/koneksi.php';
?>





<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data Outlet </h1>

</div>






<!-- KODING DISNI -->


<div class="row">
	<div class="col-lg-12">
		<button class="btn mb-3 invert" style="background-color: #4B0080; color: #FFFFFF"  data-toggle="modal" data-target="#tambah_pengguna"><i class="fas fa-plus fa-sm"></i> Tambah Data Outlet
		</button>





		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
						<thead><tr>
							<th>ID Outlet</th>
							<th>Nama Outlet</th>
							<th>Alamat Outlet</th>
							<th>No Telepon</th>

							<th>Opsi</th>
						</tr></thead>
						<tbody>
							<?php 

							$no = 1;
							$query = "SELECT * FROM tb_outlet";
							$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
							while ($data = mysqli_fetch_array($sql_rm)) {
								$idb = $data['id_outlet'];
								?>
								<tr>
									<td align="center"><?php echo $no++; ?></td>
									<td ><?php echo $data['nama'] ?></td>
									<td><?php echo $data['alamat'] ?></td>
									<td><?php echo $data['tlp'] ?></td>




									<td align="center">

										<a href="delete/delete_outlet.php?id=<?= $data['id']; ?>" id="btn-hapus" >
											<button class="btn btn-circle btn-sm btn-danger" name="hapus"><i class="fa fa-trash"></i></button>
										</a>

										<button data-toggle="modal" class="btn btn-circle btn-sm btn-info" data-target="#edit<?=$idb;?>" ><i class="fas fa-edit" ></i></button>
									</a>

									<div id="edit<?=$idb;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">

												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">FORM EDIT OUTLET</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												</div>
												<div class="modal-body" id="modal-edit">

													<form class="" method="post" action="./ubah/ubah_outlet.php" enctype="multipart/form-data">

														<div class="form-group">
															<label for="" class="control-label">ID</label>
															<input type="text" class="form-control" id="id" required name="id" value="<?php echo $data['id']; ?>" readonly="readonly"style="color: red;">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Nama Outlet</label>
															<input type="text" class="form-control" id="nama" required name="nama" value="<?php echo $data['nama'] ?>">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Alamat Outlet</label>
															<input type="text" class="form-control" id="alamat" required name="alamat" value="<?php echo $data['alamat'] ?>">
														</div>



														<div class="form-group">
															<label for="nama_barang" class="control-label">Telepon</label>
															<input type="text" class="form-control" id="telepon" required name="tlp" value="<?php echo $data['tlp'] ?>">
														</div>



													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
														<input type="submit" class="btn btn-primary" name="ubah_outlet" value="Simpan">
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
					<h4 class="modal-title" id="myModalLabel">FORM TAMBAH OUTLET</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" id="modal-edit">

					<form class="" method="post" action="./input_outlet.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="" class="control-label">Nama Outlet</label>
							<input type="text" class="form-control" id="nama" required name="nama">
						</div>



						<div class="form-group">
							<label for="" class="control-label">Alamat Outlet</label>
							<input type="text" class="form-control" id="alamat" required name="alamat">
						</div>


						<div class="form-group">
							<label for="" class="control-label">No Telepon</label>
							<input type="text" class="form-control" id="tlp" required name="tlp">
						</div>


						<div class="form-group">
							<label>Pilih ID Outlet</label>
							<select name="id_outlet" class="custom-select form-control">
								<option selected >Pilih ID Outlet</option>
								<?php
								$supp=mysqli_query($kon,"select * from tb_outlet");
								while($s=mysqli_fetch_array($supp)){
									?>
									<option value="<?php echo $s['nama'] ?>"><?php echo $s['id_outlet'] ?></option>
									<?php
								}
								?>
							</select>
						</div>



						<div class="modal-footer">
							<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="input_outlet" value="save">
						</form>
					</div>

				</div>
			</div>
		</div>