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
    foreach($pegawai as $u){ ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Gaji & Tunjangan Pegawai</h3>
        <div class="input-group margin pull-right">
        <div class="input-group-btn pull-right">
          <!-- <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url(). 'datapegawai/edit/' . $u->nip; ?>"><i class="glyphicon glyphicon-pencil"></i> Ubah Data</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo base_url(). 'datapegawai/hapus/' . $u->nip; ?>"
                  onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo base_url(). 'datapegawai/report/' . $u->nip; ?>"><i class="glyphicon glyphicon-print"></i> Print</a>
              </li>
            </ul> -->
        </div><!-- /btn-group -->
      </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <h1><?php echo $u->namaPegawai ?></h1>
        <h3><?php echo $u->nip ?></h3>
        <table class="table table-bordered table-striped">
          <tr>
            <td>Gaji Pokok</td>
            <td><?php $gajiPokok = $u->gajiPokok; echo rupiah($gajiPokok) ?></td>
          </tr>
        </table>
        <h3>Tunjangan</h3>
        <table class="table table-bordered table-striped">
          <tr>
            <td>Istri</td>
            <td><?php $tjIstri = $u->tjIstri;  echo rupiah($tjIstri) ?></td>
          </tr>
          <tr>
            <td>Anak</td>
            <td><?php $tjAnak = $u->tjAnak; echo rupiah($tjAnak) ?></td>
          </tr>
          <tr>
            <td>UPNS</td>
            <td><?php $tjUpns = $u->tjUpns; echo rupiah($tjUpns) ?></td>
          </tr>
          <tr>
            <td>Struk</td>
            <td><?php $tjStruk = $u->tjStruk; echo rupiah($tjStruk) ?></td>
          </tr>
          <tr>
            <td>Fungsi</td>
            <td><?php $tjFungsi = $u->tjFungsi; echo rupiah($tjFungsi) ?></td>
          </tr>
          <tr>
            <td>Pencil</td>
            <td><?php $tjPencil = $u->tjPencil; echo rupiah($tjPencil) ?></td>
          </tr>
          <tr>
            <td>Lain</td>
            <td><?php $tjLain = $u->tjLain; echo rupiah($tjLain) ?></td>
          </tr>
          <tr>
            <td>Kompen</td>
            <td><?php $tjKompen = $u->tjKompen; echo rupiah($tjKompen) ?></td>
          </tr>
          <tr>
            <td>Beras</td>
            <td><?php $tjBeras = $u->tjBeras; echo rupiah($tjBeras) ?></td>
          </tr>
          <tr>
            <td>Pph</td>
            <td><?php $tjPph = $u->tjPph; echo rupiah($tjPph) ?></td>
          </tr>
          <tr>
            <td>Pembul</td>
            <td><?php $pembul = $u->pembul; echo rupiah($pembul) ?></td>
          </tr>
          <tr>
            <td>UPNS</td>
            <td><?php $tjUpns = $u->tjUpns; echo rupiah($tjUpns) ?></td>
          </tr>
          <tr>
            <td>UPNS</td>
            <td><?php $tjUpns = $u->tjUpns; echo rupiah($tjUpns) ?></td>
          </tr>
        </table>
          <hr>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Total Gaji </th>
            <th><?php
            $totalGaji = ($gajiPokok+$tjIstri+$tjAnak+$tjStruk+$tjFungsi+$tjPencil+$tjLain+$tjKompen+$tjBeras+$tjPph+$pembul+$tjUpns);
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
