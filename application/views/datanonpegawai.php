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
                <th>Jabatan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->kdPegawai ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->jabatan ?></td>
                <td>
                  <!-- <a class="btn btn-sm btn-primary" title="Detail" href="datapegawai/detail/<?php echo $u->kdPegawai ?>">Detail</a> -->
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
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
              <div class="form-group col-xs-5">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
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
