 <?php
include 'config/koneksi.php';
?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
 	<h1 class="h3 mb-0 text-gray-800"> Laporan </h1>
 	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
 		class="fas fa-download fa-sm text-white-50"></i> cetak laporan</a>
 	</div>

 	<div class="row">

      <div class="col-12 mb-3">
        <h5>Tentukan Range Tanggal</h5>
        <form name="form-cetak" method="get" action="proses_cetak.php" target="_blank">
          <table>
            <tr>
              <td><input type="date" name="" ></td>
              <td><input type="date" name="" ></td>
              <td><input type="submit" value="Cetak Laporan" name="" ></td>
            </tr>
          </table>
        </form>
      </div>


 		<!-- Earnings (Monthly) Card Example -->
 		<div class="col-xl-3 col-md-6 mb-4">
 			<div class="card border-left-primary shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
 							Data Member</div>
 							<div class="h5 mb-0 font-weight-bold text-gray-800">
 								
 							</div>
 						</div>



 						<div class="col-auto">
 							<i class="fas fa-calendar fa-2x text-gray-300"></i>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 		<!-- Earnings (Monthly) Card Example -->
 		<div class="col-xl-3 col-md-6 mb-4">
 			<div class="card border-left-success shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
 							Laporan Pendapatan</div>
 							<div class="h5 mb-0 font-weight-bold text-gray-800">isi laporan pendapatan</div>
 						</div>
 						<div class="col-auto">
 							<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>

 		<!-- Earnings (Monthly) Card Example -->
 		<div class="col-xl-3 col-md-6 mb-4">
 			<div class="card border-left-info shadow h-100 py-2">
 				<div class="card-body">
 					<div class="row no-gutters align-items-center">
 						<div class="col mr-2">
 							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Outlet
 							</div>
 							<div class="row no-gutters align-items-center">
 								<div class="col-auto">
 									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">isi data outlet</div>
 								</div>
 								<div class="col">
 									<div class="progress progress-sm mr-2">
 										<div class="progress-bar bg-info" role="progressbar"
 										style="width: 50%" aria-valuenow="50" aria-valuemin="0"
 										aria-valuemax="100"></div>
 									</div>
 								</div>
 							</div>
 						</div>
 						<div class="col-auto">
 							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>














