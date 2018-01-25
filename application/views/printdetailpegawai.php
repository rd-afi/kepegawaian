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
  <body>



<?php foreach($pegawai as $u){ ?>
<div class="box-body">

  <h1><?php echo $u->namaPegawai ?></h1>
  <h3><?php echo $u->nip ?></h3>
  <table class="table table-bordered table-striped">
    <tr>
      <td style="width : 30%;">Tempat, Tanggal Lahir</td>
      <td><?php echo $u->tempat; echo ", ". date('d-m-Y', strtotime($u->tglLahir));?></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><?php echo $u->agama ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?php echo $u->alamat ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><?php echo $u->jk ?></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td><?php echo $u->telepon ?></td>
    </tr>
  </table>
  <h3>Status Pekerjaan</h3>
  <table class="table table-bordered table-striped">
    <tr>
      <td style="width : 30%;">Pangkat, Gol/ruang</td>
      <td><?php echo $u->namaPangkat ?></td>
    </tr>
    <tr>
      <td>TMT Pangkat</td>
      <td><?php echo date('d-m-Y', strtotime($u->tmtPangkat));?></td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td><?php echo $u->namaJabatan ?></td>
    </tr>
    <tr>
      <td>TMT Jabatan</td>
      <td><?php echo date('d-m-Y', strtotime($u->tmtJabatan));?></td>
    </tr>
    <tr>
      <td>Mulai Menjabat</td>
      <td><?php echo date('d-m-Y', strtotime($u->mulaiJabatan));?></td>
    </tr>
  </table>

</div>
<?php } ?>

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
