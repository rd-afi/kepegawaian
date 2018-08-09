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
    <?php
    function rupiah($angka){
       $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
       return $hasil_rupiah;
    }
    foreach($pegawainon as $u){ ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Gaji & Tunjangan Pegawai</h3>
        <div class="input-group margin pull-right">
        <div class="input-group-btn pull-right">
        </div><!-- /btn-group -->
      </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <h4 align = 'center'>Laporan Gaji</h4>
        <center><h4> Bulan <?php echo date('F',strtotime('-1 month')).' '.date('Y') ?></h4></center>

        <h1><?php echo $u->nama ?></h1>
        <h3><?php echo $u->kdPegawai ?></h3>
        <table class="table table-bordered table-striped">
          <tr>
            <th width="300">Jumlah Kehadiran</th>
            <td><?php $absen = $u->absen;
            if (!empty($bulan_tahun)) {
              echo '<script language="javascript">';
              echo 'alert("message successfully sent")';
              echo '</script>';
            } else {
              echo $absen;
            }
             ?></td>
          </tr>
          <!-- <tr>
            <td>Gaji Pokok</td>
            <td><?php
            $gajiPokok = $u->gajiPokok;
            echo rupiah($gajiHarian = $gajiPokok / 22);
             ?></td>
          </tr> -->
        </table>
        <h3>Potongan</h3>
        <table class="table table-bordered table-striped">
          <tr>
            <th width="300">BPJS</th>
            <td> - <?php $bpjs = 64000; echo rupiah($bpjs) ?> </td>
          </tr>
        </table>
          <hr>
        <table class="table table-bordered table-striped">
          <tr>
            <th width="300">Total Gaji </th>
            <th><?php
            $totalGaji = (($gajiHarian*$absen)-$bpjs);
            echo rupiah($totalGaji); ?></th>
          </tr>
        </table>
    </div>
    <?php } ?>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

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
