 

<?php 
include './config/koneksi.php';


?>





<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data User</h1>

</div>






<!-- KODING DISNI -->


<div class="row">
	<div class="col-lg-12">
		<button class="btn mb-3 invert" style="background-color: #4B0080; color: #FFFFFF"  data-toggle="modal" data-target="#tambah_pengguna"><i class="fas fa-plus fa-sm"></i> Tambah Data User
		</button>
		




		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="tablesaw table-striped table-hover table-bordered table " data-tablesaw-mode="columntoggle" id="data-tables">
						<thead><tr>
							<th>ID</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>ID Outlet</th>
							<th>Role</th>

							<th>Opsi</th>
						</tr></thead>
						<tbody>
							<?php 

							$no = 1;
							$query = "SELECT * FROM tb_user



							";
							$sql_rm = mysqli_query($kon, $query) or die (mysqli_error($kon));
							while ($data = mysqli_fetch_array($sql_rm)) {
								$idb = $data['id_user'];
								?>
								<tr>
									<td align="center"><?php echo $no++; ?></td>
									<td ><?php echo $data['nama'] ?></td>
									<td><?php echo $data['username'] ?></td>
									<td><?php echo $data['password'] ?></td>
									<td><?php echo $data['id_outlet'] ?></td>
									<td><?php echo $data['role']?></td>




									<td align="center">



										<a href="delete/delete_user.php?id=<?php echo $data['id'] ?>" id="btn-hapus" >
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

													<form class="" method="post" action="./ubah/ubah_user.php" enctype="multipart/form-data">

														<div class="form-group">
															<label for="" class="control-label">ID</label>
															<input type="text" class="form-control" id="id" required name="id" value="<?php echo $data['id']; ?>" readonly="readonly"style="color: red;">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Nama </label>
															<input type="text" class="form-control" id="nama" required name="nama" value="<?php echo $data['nama'] ?>">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">Username</label>
															<input type="text" class="form-control" id="username" required name="username" value="<?php echo $data['username'] ?>">
														</div>

														<div class="form-group">
															<label for="nama_barang" class="control-label">ID Outlet</label>
															<input type="text" class="form-control" id="id_outlet" required name="id_outlet" value="<?php echo $data['id_outlet'] ?>">
														</div>

														<div class="form-group">
															<label>Role</label>
															<select name="role" class="custom-select form-control">
																<option></option>
																<option>Admin</option>
																<option>Kasir</option>
																<option>Owner</option>
																<?php
																$role=mysqli_query($kon,"select * role");
																while($role=mysqli_fetch_array($role)){
																	?>
																	<option value="<?php echo $j['role'] ?>"><?php echo $j['role'] ?></option>
																	<?php
																}
																?>
															</select>
														</div>



													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Kembali</button>
														<input type="submit" class="btn btn-primary" name="ubah_member" value="Simpan">
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
					<h4 class="modal-title" id="myModalLabel">FORM TAMBAH USER</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" id="modal-edit">

					<form class="" method="post" action="./input_user.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="" class="control-label">Nama User</label>
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
							<label>Pilih ID Outlet</label>
							<select name="id_outlet" class="custom-select form-control">
								<option selected >Pilih ID Outlet</option>
								<?php
								$supp=mysqli_query($kon,"select * from tb_outlet");
								while($s=mysqli_fetch_array($supp)){
									?>
									<option value="<?php echo $s['id'] ?>"><?php echo $s['id'] ?></option>
									<?php
								}
								?>
							</select>
						</div>


						<div class="form-group">
							<label for="" class="control-label">Pilih Role</label>
							<select class="control-label form-control" name="role">

								<option>Owner</option>
								<option>Admin</option>
								<option>Kasir</option>
							</select>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" name="input_user" value="save">
					</form>
				</div>

			</div>
		</div>
	</div>