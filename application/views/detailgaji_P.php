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
                <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <!-- <li>
                      <a href="<?php echo base_url(). 'datapegawai/edit/' . $u->nip; ?>"><i class="glyphicon glyphicon-pencil"></i> Ubah Data</a>
                    </li> -->
                    <!-- <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url(). 'datapegawai/hapus/' . $u->nip; ?>"
                        onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                    </li>
                    <li class="divider"></li> -->
                    <li>
                      <a href="<?php echo base_url(). 'datapegawai_P/report/' . $u->nip; ?>"><i class="fa fa-download"></i> Unduh</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url(). 'datapegawai_P/print_gaji/' . $u->nip; ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Print</a>
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
