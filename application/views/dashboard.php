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
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="width:80%; height: 400px !important;  margin: 0 auto;">
      <div class="item active">
        <img class="img-responsive center-block" src="assets/image/1.jpeg" alt="">
      </div>

      <div class="item">
        <img class="img-responsive center-block" src="assets/image/2.jpg" alt="">
      </div>

      <div class="item">
        <img src="assets/image/3.jpg" alt="" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>

<!-- <section class="content">
    <div class="row">

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
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-aqua">
            <div class="inner">
              <span class="info-box-icon bg-aqua">
                <i class="ion ion-ios-people"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Akun Terdaftar</span>
                <h3><?php echo $jumAkun; ?></h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <span class="info-box-icon bg-yellow">
                <i class="ion ion-ios-people"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Non-Pegawai Terdaftar</span>
                <h3><?php echo $jumPegawaiNon; ?></h3>
              </div>
            </div>
          </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Total PNS berdasarkan Jenis Kelamin</h3>
            </div>
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
          </div>
        </div>
      </div>
</section> -->



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
