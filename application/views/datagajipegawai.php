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
        DATA GAJI PEGAWAI
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Gaji Pegawai</li>
    </ol>
</section>

<section class="content">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Tabel Data Pegawai</a></li>
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
                <th>Pangkat</th>
                <!-- <th>TMT</th> -->
                <th>Jabatan</th>
                <!-- <th>TMT</th> -->
                <!-- <th>Status</th> -->
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->nip ?></td>
                <td><?php echo $u->namaPegawai ?></td>
                <td><?php echo $u->namaPangkat ?></td>
                <!-- <td><?php echo date('d-m-Y', strtotime($u->tmtPangkat));?></td> -->
                <td><?php echo $u->namaJabatan ?></td>
                <!-- <td><?php echo date('d-m-Y', strtotime($u->tmtJabatan));?></td> -->
                <!-- <td><?php echo date('d-m-Y', strtotime($u->mulaiJabatan));?></td> -->
                <td><a class="btn btn-sm btn-primary" title="Detail" href="detail_gaji/<?php echo $u->nip ?>">Detail</a></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Pangkat</th>
                <!-- <th>TMT</th> -->
                <th>Jabatan</th>
                <!-- <th>TMT</th> -->
                <!-- <th>Status</th> -->
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
      </div>
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
