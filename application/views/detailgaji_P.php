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
                  <td><?php echo rupiah($u->gajiPokok) ?></td>
                </tr>
              </table>
              <h3>Tunjangan</h3>
              <table class="table table-bordered table-striped">
                <tr>
                  <td>Istri</td>
                  <td><?php echo rupiah($u->tjIstri) ?></td>
                </tr>
                <tr>
                  <td>Anak</td>
                  <td><?php echo rupiah($u->tjAnak) ?></td>
                </tr>
                <tr>
                  <td>UPNS</td>
                  <td><?php echo rupiah($u->tjUpns) ?></td>
                </tr>
                <tr>
                  <td>Struk</td>
                  <td><?php echo rupiah($u->tjStruk) ?></td>
                </tr>
                <tr>
                  <td>Fungsi</td>
                  <td><?php echo rupiah($u->tjFungsi) ?></td>
                </tr>
                <tr>
                  <td>Pencil</td>
                  <td><?php echo rupiah($u->tjPencil) ?></td>
                </tr>
                <tr>
                  <td>Lain</td>
                  <td><?php echo rupiah($u->tjLain) ?></td>
                </tr>
                <tr>
                  <td>Kompen</td>
                  <td><?php echo rupiah($u->tjKompen) ?></td>
                </tr>
                <tr>
                  <td>Beras</td>
                  <td><?php echo rupiah($u->tjBeras) ?></td>
                </tr>
                <tr>
                  <td>Pph</td>
                  <td><?php echo rupiah($u->tjPph) ?></td>
                </tr>
                <tr>
                  <td>Pembul</td>
                  <td><?php echo rupiah($u->pembul) ?></td>
                </tr>
                <tr>
                  <td>UPNS</td>
                  <td><?php echo rupiah($u->tjUpns) ?></td>
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
