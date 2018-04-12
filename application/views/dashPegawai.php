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
$this->load->view('template/topbarPeg');
$this->load->view('template/sidebarPeg');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <?php foreach($pegawai as $u){ ?>
    <h1>SELAMAT DATANG,
    <!-- <?php echo $this->session->userdata("username"); ?></h1> -->
    <?php echo $u->namaPegawai;  } ?></h1>      

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
