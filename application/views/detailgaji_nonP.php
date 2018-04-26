<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content-header">
    <h1>
        GAJI & TUNJANGAN PEGAWAI
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(). 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(). 'datapegawai'; ?>">Data Pegawai</a></li>
        <li class="active">Gaji & Tunjangan Pegawai</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

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
                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="<?php echo base_url(). 'datapegawainon/report/' . $u->kdPegawai; ?>"><i class="fa fa-download"></i> Unduh</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url(). 'datapegawainon/print_gaji/' . $u->kdPegawai; ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Print</a>
                    </li>
                  </ul>
              </div><!-- /btn-group -->
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <h1><?php echo $u->nama ?></h1>
              <h3><?php echo $u->kdPegawai ?></h3>
              <table class="table table-bordered table-striped">
                <tr>
                  <td>Gaji Pokok</td>
                  <td><?php $gajiPokok = $u->gajiPokok; echo rupiah($gajiPokok) ?></td>
                </tr>
              </table>
              <h3>Potongan</h3>
              <table class="table table-bordered table-striped">
                <tr>
                  <td>BPJS</td>
                  <td> - <?php $bpjs = 64000; echo rupiah($bpjs) ?> </td>
                </tr>
              </table>
                <hr>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>Total Gaji </th>
                  <th><?php
                  $totalGaji = ($gajiPokok-$bpjs);
                  echo rupiah($totalGaji); ?></th>
                </tr>
              </table>
          </div>
        <?php } ?>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  $this->load->view('template/foot');
  ?>
<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
