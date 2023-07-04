<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Halaman Admin</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/dataTables/datatables.min.css">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="vendor/daterangepicker/daterangepicker.js"></script>
  <link rel="vendor" href="plugins/daterangepicker/daterangepicker.css">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<marquee>
					<div class="sidebar-brand-text mx-3">Halo Admin<sup></sup> A'team Laundry</div>
				</marquee>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="?page=dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Beranda</span></a>
				</li>

				

				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Master
				</div>

				<li class="nav-item">
					<a class="nav-link" href="?page=dataOutlet">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Data Outlet</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="?page=dataPaket">
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Data Paket</span></a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="?page=dataUser">
								<i class="fas fa-fw fa-tachometer-alt"></i>
								<span>Data User</span></a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="?page=dataMember">
									<i class="fas fa-fw fa-tachometer-alt"></i>
									<span>Data Member</span></a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="?page=Transaksi">
										<i class="fas fa-fw fa-tachometer-alt"></i>
										<span>Transaksi Baru</span></a>
									</li>
									<li class="nav-item">
									<a class="nav-link" href="?page=TransaksiProses">
										<i class="fas fa-fw fa-tachometer-alt"></i>
										<span>Transaksi Proses</span></a>
									</li>
									<li class="nav-item">
									<a class="nav-link" href="?page=TransaksiSelesai">
										<i class="fas fa-fw fa-tachometer-alt"></i>
										<span>Transaksi Selesai</span></a>
									</li>

									<li class="nav-item">
									<a class="nav-link" href="?page=TransaksiAmbil">
										<i class="fas fa-fw fa-tachometer-alt"></i>
										<span>Transaksi Ambil</span></a>
									</li>

									<!-- Divider -->
									<hr class="sidebar-divider">

									<!-- Heading -->
									<div class="sidebar-heading">
										Cetak Laporan
									</div>

									<li class="nav-item">
										<a class="nav-link" href="?page=laporan">
											<i class="fas fa-fw fa-tachometer-alt"></i>
											<span>Laporan</span></a>
										</li>





										<!-- Divider -->
										<hr class="sidebar-divider d-none d-md-block">

										<!-- Sidebar Toggler (Sidebar) -->
										<div class="text-center d-none d-md-inline">
											<button class="rounded-circle border-0" id="sidebarToggle"></button>
										</div>

									</ul>
									<!-- End of Sidebar -->








									<!-- Content Wrapper -->
									<div id="content-wrapper" class="d-flex flex-column">

										<!-- Main Content -->
										<div id="content">

											<!-- Topbar -->
											<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

												<!-- Sidebar Toggle (Topbar) -->
												<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
													<i class="fa fa-bars"></i>
												</button>

												<!-- Topbar Search -->
												<marquee>
													<form>
														Selamat Datang Admin A'team Laundry
													</form>
												</marquee>

												<!-- Topbar Navbar -->
												<ul class="navbar-nav ml-auto">

													<!-- Nav Item - Search Dropdown (Visible Only XS) -->
													<li class="nav-item dropdown no-arrow d-sm-none">
														<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
														data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fas fa-search fa-fw"></i>
													</a>
													<!-- Dropdown - Messages -->
													<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
													aria-labelledby="searchDropdown">
													<form class="form-inline mr-auto w-100 navbar-search">
														<div class="input-group">
															<input type="text" class="form-control bg-light border-0 small"
															placeholder="Search for..." aria-label="Search"
															aria-describedby="basic-addon2">
															<div class="input-group-append">
																<button class="btn btn-primary" type="button">
																	<i class="fas fa-search fa-sm"></i>
																</button>
															</div>
														</div>
													</form>
												</div>
											</li>

											<!-- Nav Item - Alerts -->


											<div class="topbar-divider d-none d-sm-block"></div>

											<!-- Nav Item - User Information -->
											<li class="nav-item dropdown no-arrow">
												<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
												<img class="img-profile rounded-circle"
												src="img/undraw_profile.svg">
											</a>
											<!-- Dropdown - User Information -->
											<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
											aria-labelledby="userDropdown">
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
												<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
												Keluar
											</a>
										</div>
									</li>

								</ul>

							</nav>

							<!-- End of Topbar -->











							<!-- Begin Page Content -->
							<div class="container-fluid">



								<?php 
								@$page = $_GET['page'];
								switch($page){
									case 'laporan':
									include "admin/laporan.php";
									break;
									case 'dataMember':
									include "admin/dataMember.php";
									break;
									case 'dataOutlet':
									include "admin/dataOutlet.php";
									break;
									case 'dataPaket':
									include "admin/dataPaket.php";
									break;
									case 'hapus':
									include "admin/hapus.php";
									break;
									case 'dataUser':
									include "admin/dataUser.php";
									break;
									case 'Transaksi':
									include "admin/transaksi.php";
									break;
									case 'TransaksiProses':
									include "admin/transaksi_proses.php";
									break;
									case 'TransaksiSelesai':
									include "admin/transaksi_selesai.php";
									break;
									case 'TransaksiAmbil':
									include "admin/transaksi_ambil.php";
									break;
									default:
									$page = "dashboard";
									include "admin/dashboard.php";
									break;
								}



								?>







							</div>
							<!-- /.container-fluid -->

						</div>
						<!-- End of Main Content -->

						<!-- Footer -->

						<!-- End of Footer -->

					</div>
					<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>

				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Tekan Keluar Jika Ya.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
							<a class="btn btn-primary" onclick="" href="logout.php">Keluar</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Bootstrap core JavaScript-->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Core plugin JavaScript-->
			<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

			<!-- Custom scripts for all pages-->
			<script src="js/sb-admin-2.min.js"></script>

			<!-- Page level plugins -->
			<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

			<!-- Page level custom scripts --><!-- 
			<script src="js/demo/chart-area-demo.js"></script>
			<script src="js/demo/chart-pie-demo.js"></script> -->

			<!-- DATA TABLES -->
			<script src="assets/dataTables/datatables.min.js"></script>
			<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

			<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

			<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
			<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
			<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

		</body>


		<!-- Data Tables -->
		<script type="text/javascript">
			$(document).ready(function() {
				$('#data-tables').DataTable()
			} );
		</script>



		<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type: 'POST',
					url: "admin/get_outlet.php",
					cache: false, 
					success: function(msg){
						$("#id_outlet").html(msg);
					}
				});

				$("#id_outlet").change(function(){
					var id_outlet = $("#id_outlet").val();
					$.ajax({
						type: 'POST',
						url: "admin/get_paket.php",
						data: {id_outlet: id_outlet},
						cache: false,
						success: function(msg){
							$("#id_paket").html(msg);
						}
					});
				});

			});

			function hitung_total()
			{
				var sub = document.getElementById("sub_total").value;
				var p = document.getElementById("pajak").value;
				var d = document.getElementById("diskon").value;
				var bt = document.getElementById("bt").value;

				if(sub != '' && p != '' && d == '' && bt == '')
				{
					document.getElementById("total_semua").innerHTML = 'Rp ' + (parseInt(sub) + parseInt(p));
				}
				else if(sub != '' && p != '' && d == '' && bt != '')
				{
					document.getElementById("total_semua").innerHTML = 'Rp ' + (parseInt(sub) + parseInt(p) + parseInt(bt));
				}
				else if(sub != '' && p != '' && d != '' && bt != '')
				{
					document.getElementById("total_semua").innerHTML = 'Rp ' + ((parseInt(sub) + parseInt(p) + parseInt(bt)) - parseInt(d));
				} 
				else
				{
					document.getElementById("total_semua").innerHTML = '';
				}
			}
		</script>
		<script type="text/javascript">
  /*
  fungsi javascript untuk menghapus data
  */
  
 $(function () {
   $('#reservationdate').datetimepicker({
        format: 'L '
    });
}

</script>


</html>