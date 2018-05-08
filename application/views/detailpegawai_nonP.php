<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbarNonPeg');
$this->load->view('template/sidebarNonPeg');
?>
<section class="content-header">
    <h1>
        DETAIL NON-PEGAWAI
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(). 'dashboard'; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(). 'datapegawai'; ?>">Data Pegawai</a></li>
        <li class="active">Detail Pegawai</li>
    </ol>
</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <?php foreach($pegawainon as $u){ ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pegawai</h3>
              <div class="input-group margin pull-right">
              <div class="input-group-btn pull-right">
                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="<?php echo base_url(). 'dashNonPegawai/edit/' . $u->kdPegawai; ?>"><i class="glyphicon glyphicon-pencil"></i> Ubah Data</a>
                    </li>
                    <!-- <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url(). 'datapegawainon/hapus/' . $u->kdPegawai; ?>"
                        onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </li> -->
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url(). 'datapegawai/report/' . $u->kdPegawai; ?>"><i class="glyphicon glyphicon-print"></i> Print</a>
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
                  <td>Jenis Kelamin</td>
                  <td><?php echo $u->jkNon ?></td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td><?php echo $u->namaJabatanNon ?></td>
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
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>
