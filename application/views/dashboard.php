<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/template/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/template/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/template/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/template/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/template/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>SELAMAT DATANG, <?php echo $this->session->userdata("username"); ?></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <span class="info-box-icon bg-yellow">
                <i class="ion ion-ios-people"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Pegawai Terdaftar</span>
                <h3><?php echo $jumPegawai; ?></h3>
              </div><!-- /.info-box-content -->
            </div>
          </div><!-- /.info-box -->
        </div><!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <span class="info-box-icon bg-aqua">
                <i class="ion ion-ios-people"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Akun Terdaftar</span>
                <h3><?php echo $jumAkun; ?></h3>
              </div><!-- /.info-box-content -->
            </div>
          </div><!-- /.info-box -->
        </div><!-- /.col -->


    </div><!-- /.row -->

    <!-- TABEL -->
    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Total PNS berdasarkan Jenis Kelamin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th align="right">Golongan</th>
                  <th>Laki-Laki</th>
                  <th>Perempuan</th>
                  <th>Total</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>I</td>
                  <td><?php echo $jkpnslkg1; ?></td>
                  <td><?php echo $jkpnsprg1; ?></td>
                  <td><?php echo $ttljkg1 = $jkpnsprg1 + $jkpnslkg1; ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>II</td>
                  <td><?php echo $jkpnslkg2; ?></td>
                  <td><?php echo $jkpnsprg2; ?></td>
                  <td><?php echo $ttljkg2 = $jkpnsprg2 + $jkpnslkg2; ?></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>III</td>
                  <td><?php echo $jkpnslkg3; ?></td>
                  <td><?php echo $jkpnsprg3; ?></td>
                  <td><?php echo $ttljkg3 = $jkpnsprg3 + $jkpnslkg3; ?></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>IV</td>
                  <td><?php echo $jkpnslkg4; ?></td>
                  <td><?php echo $jkpnsprg4; ?></td>
                  <td><?php echo $ttljkg4 = $jkpnsprg4 + $jkpnslkg4; ?></td>
                </tr>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Total</th>
                    <th><?php
                    $totallk = $jkpnslkg1 + $jkpnslkg2 + $jkpnslkg3 + $jkpnslkg4;
                    echo $totallk; ?></th>
                    <th><?php
                    $totalpr = $jkpnsprg1 + $jkpnsprg2 + $jkpnsprg3 + $jkpnsprg4;
                    echo $totalpr; ?></th>
                    <th><?php echo $ttljkg1 + $ttljkg2 + $ttljkg3 + $ttljkg4; ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


</section><!-- /.content -->



<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- Sparkline -->
<script src="<?php echo base_url('assets/template/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/template/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/template/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/template/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/template/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/template/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('template/foot');
?>
