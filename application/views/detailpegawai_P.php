<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbarPeg');
$this->load->view('template/sidebarPeg');
?>
<section class="content-header">
    <h1>
        DETAIL PEGAWAI
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

          <?php foreach($pegawai as $u){ ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Pegawai</h3>
              <div class="input-group margin pull-right">
              <div class="input-group-btn pull-right">
                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
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
                  </ul>
              </div><!-- /btn-group -->
            </div>
            </div>
            <!-- /.box-header -->
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
