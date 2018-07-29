<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak</title>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets/template/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/template/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?php echo base_url('assets/template/plugins/datatables/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/template/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />

  </head>
  <body onload="window.print();">
    <div class="nav-tabs-custom">
      <!-- TAB 1 -->
      <div class="tab-content">
          <div class="box-body">
        		<h4 align = 'center'>Laporan Gaji</h4>
        		<center><h4> Periode  <?php echo get_monthname($bulan).' '.$tahun ?></h4></center>
            <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Pangkat</th>
                  <!-- <th>TMT</th> -->
                  <th>Total Gaji</th>
                  <!-- <th>TMT</th> -->
                  <!-- <th>Status</th> -->
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                function rupiah($angka){
      	           $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
                   return $hasil_rupiah;
                }
                foreach($data as $u){ ?>
                <tr>
                  <td><?php echo $u->nip ?></td>
                  <td><?php echo $u->namaPegawai ?></td>
                  <td><?php echo $u->namaPangkat ?></td>
                  <!-- <td><?php echo date('d-m-Y', strtotime($u->tmtPangkat));?></td> -->
                  <td><?php
                  $gajiPokok = $u->gajiPokok;
                  $tjIstri = $u->tjIstri;
                  $tjAnak = $u->tjAnak;
                  $tjUpns = $u->tjUpns;
                  $tjStruk = $u->tjStruk;
                  $tjFungsi = $u->tjFungsi;
                  $tjPencil = $u->tjPencil;
                  $tjLain = $u->tjLain;
                  $tjKompen = $u->tjKompen;
                  $tjBeras = $u->tjBeras;
                  $tjPph = $u->tjPph;
                  $pembul = $u->pembul;
                  $tjUpns = $u->tjUpns;
                  $tjUpns = $u->tjUpns;
                  $totalGaji = ($gajiPokok+$tjIstri+$tjAnak+$tjStruk+$tjFungsi+$tjPencil+$tjLain+$tjKompen+$tjBeras+$tjPph+$pembul+$tjUpns);
                  echo rupiah($totalGaji);?>
                  </td>
                  <!-- <td><?php echo date('d-m-Y', strtotime($u->tmtJabatan));?></td> -->
                  <!-- <td><?php echo date('d-m-Y', strtotime($u->mulaiJabatan));?></td> -->
                  <td><a class="btn btn-sm btn-primary" title="Detail" href="../datapegawai/detail_gaji/<?php echo $u->nip ?>">Detail</a></td>
                </tr>
                <?php
                $totalBulanan = $totalGaji++;
                } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3"  style="background-color:#e7b3b3;">Total</th>
                  <!-- <th>NIP</th> -->
                  <!-- <th>Nama Pegawai</th> -->
                  <!-- <th>Pangkat</th> -->
                  <!-- <th>TMT</th> -->
                  <th><?php echo $totalBulanan; ?></th>
                  <!-- <th>TMT</th> -->
                  <!-- <th>Status</th> -->
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- END TAB 1 -->
      </div>
    </div>

</body>
</html>

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/template/plugins/jQuery/jquery-2.1.4.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/template/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/dist/js/app.min.js') ?>" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/template/plugins/datatables/datatables.net/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/template/plugins/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>" type="text/javascript"></script>
