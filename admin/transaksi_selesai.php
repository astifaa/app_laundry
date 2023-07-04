
<?php 
include 'config/koneksi.php';

?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Data Transaksi Selesai</h3>

    
          </div>
          <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
              <thead>

                <tr>
                  <th>Nama Member</th>
                  <th>Nama Outlet</th>
                  <th>Jenis Paket</th>
                  <th>Keterangan</th>
                  <th>Batas Waktu</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
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
                  tb_transaksi.status = 'selesai' ORDER BY tb_transaksi.id_transaksi desc
                  ");

                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td>
                      <input type="hidden" name="id_transaksi" value="<?php echo $d['id_transaksi'] ?>">
                      <?php echo $d['id_member']; ?>
                    </td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['jenis'], " - ", $d['nama_paket'] ; ?></td>
                    <td><?php echo $d['keterangan']; ?></td>
                    <td><?php echo $d['batas_waktu']; ?></td>
                    <td><b><i><?php echo $d['status']; ?></i></b></td>
                    <td><a class="btn btn-success btn-sm" href='proses_aksi.php?id_transaksi=<?php echo $d['id_transaksi']?>&act=ambil'>Ambil</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
      </div>
    </div>
  </div>
  <div class="card-body pt-0">
    <!--The calendar -->
    <div id="calendar" style="width: 100%"></div>
  </div>
</div>
</section>
<!-- tutup class -->
</div>
</div>
</section>
</div>
