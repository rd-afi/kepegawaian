<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        DATA NON-PEGAWAI
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Non-Pegawai</li>
    </ol>
</section>

<section class="content">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Tabel Data Pegawai</a></li>
      <li><a href="#tab_2" data-toggle="tab">Tambah Data Pegawai</a></li>
    </ul>
    <!-- TAB 1 -->
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <div class="box-body">
          <table class="table table-striped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->kdPegawai ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->jkNon ?></td>
                <td><?php echo $u->namaJabatanNon ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" title="Detail" href="datapegawainon/detail/<?php echo $u->kdPegawai ?>">Detail</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
      </div>
      <!-- TAB 2 -->
      <div class="tab-pane" id="tab_2">
        <h3>TAMBAH DATA NON-PEGAWAI</h3>
        <div class="box-body">
          <form action="<?php echo base_url(). 'datapegawainon/tambah'; ?>" method="post">
            <div class="row">
              <div class="form-group col-xs-3">
                <label>Kode Pegawai</label>
                <input type="text" name="kdPegawai" id="kdPegawai" class="form-control" placeholder="Kode non-Pegawai" value="<?php echo $kdPegawai?>">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                <label>Nama Pegawai</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pegawai">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-5">
                <label>Jenis Kelamin</label>
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="rbJk" id="lk" class="flat-blue" value="Laki-Laki">
                      Laki-Laki
                    </label>
                    <label>
                      <input type="radio" name="rbJk" id="pr" class="flat-blue" value="Perempuan">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                  <label>Jabatan</label>
                  <select class="form-control" name="jabatan" id="jabatan">
                    <option>Pilih Jabatan</option>
                    <?php foreach($kdJabatanNon->result_array() as $row) {?>
                      <option name="jab" id="jab" value="<?php echo $row['kdJabatanNon'];?>">
                      <?php echo $row['namaJabatanNon']?>
                      </option>
                    <?php }?>
                  </select>
                  <!-- <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan"> -->
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="ALamat">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                  <label>Jenjang Pendidikan</label>
                  <select class="form-control" name="jenjang" id="jenjang">
                    <option>Pilih Jenjang</option>
                      <option name="jen" id="jen" value="Tidak Sekolah">Tidak Sekolah</option>
                      <option name="jen" id="jen" value="SD">SD</option>
                      <option name="jen" id="jen" value="SMP">SMP</option>
                      <option name="jen" id="jen" value="SMA">SMA</option>
                      <option name="jen" id="jen" value="D1">D1</option>
                      <option name="jen" id="jen" value="D2">D2</option>
                      <option name="jen" id="jen" value="D3">D3</option>
                      <option name="jen" id="jen" value="D4">D4</option>
                      <option name="jen" id="jen" value="S1">S1</option>
                      <option name="jen" id="jen" value="S2">S2</option>
                      <option name="jen" id="jen" value="S3">S3</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                  <label>Status Perkawinan</label>
                  <select class="form-control" name="perkawinan" id="perkawinan">
                    <option>Pilih Status</option>
                      <option name="statper" id="statper" value="Lajang">Lajang</option>
                      <option name="statper" id="statper" value="Sudah">Sudah</option>
                      <option name="statper" id="statper" value="Belum">Belum</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                <label>Nama Suami</label>
                <input type="text" name="suami" id="suami" class="form-control" placeholder="Nama Suami">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-xs-5">
                <label>Nama Istri</label>
                <input type="text" name="istri" id="istri" class="form-control" placeholder="Nama Istri">
              </div>
            </div>
            <br>
            <!-- BOX FOOTER -->
            <div class="box-footer clearfix">
              <input type="submit" class="btn btn-primary btn pull-right" value="Tambah">
            </div>
            <!-- END BOX FOOTER -->
          </form>
        </div>
      </div>
      <!-- END TAB 2 -->
    </div>
  </div>

</section>

<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>

<script>
  $(document).ready(function(){
    $('#myTable').DataTable();

    $('#ttl').datepicker({
      orientation: 'bottom',
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#tmtPang').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#tmtJab').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('#mulJab').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass   : 'iradio_flat-blue'
    });
  });
</script>
