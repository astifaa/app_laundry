
<?php 
include 'config/koneksi.php';

?>
<script type="text/javascript">
  /*
  fungsi javascript untuk menghapus data
  */
  function cetakStruk(id_transaksi) {
      //fungsi confirm untuk memastikan user setuju.

      // 
       var cfm = confirm("Apakah anda yakin akan cetak data ini?");
      if (cfm) {
       window.location.href='cetak_struk.php?id_transaksi='+id_transaksi+'target="_blank"';
      }
    }
  function bayar(id_transaksi) {
      //fungsi confirm untuk memastikan user setuju.

      // 
       var cfm = confirm("Apakah anda akan melakukan pembayaran?");
      if (cfm) {
       window.location.href='proses_aksi.php?id_transaksi='+id_transaksi+'&act=bayar';
      }
    }
    </script>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Data Transaksi Ambil</h3>

    
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
                  tb_transaksi.status = 'diambil' ORDER BY tb_transaksi.id_transaksi desc
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
                    <td><?php
                          $link_cetak = '<a class="btn btn-sm" href="javascript:void:;" onclick="cetakStruk(\''.$d['id_transaksi'].'\')"><i class="fa fa-print"></i> </a>'; 
                          $link_bayar = '<a class="btn btn-sm btn-danger" href="javascript:void:;" onclick="bayar(\''.$d['id_transaksi'].'\')">Bayar </a>';

                          if ($d['dibayar'] == 'dibayar') {
                            echo $link_cetak;
                         } else {
                         echo $link_bayar;
                        }
                        ?>
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
