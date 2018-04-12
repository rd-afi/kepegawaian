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
        Buat Akun
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pegawai</li>
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
                <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Pangkat</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data_pegawai as $u){ ?> 
              <tr>
                <td><?php echo $u->nip ?></td>
                <td><?php echo $u->namaPegawai ?></td>
                <td><?php echo $u->namaPangkat ?></td>
               
                <td><a class="btn btn-sm btn-primary" title="Detail" href="tambahAkun/<?php echo $u->nip ?>">Buat Akun</a></td>
              </tr	
              <?php } ?>
            </tbody>
            <tfoot>
              
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
      </div>
      <!-- TAB 2 -->
     
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

<script type="text/javascript">

function tambahAkun(nip)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('akun/ajax_add/')?>/" + kdPangkat,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="kdPangkat"]').val(data.kdPangkat);
            $('[name="namaPangkat"]').val(data.namaPangkat);
            $('[name="gajiPokok"]').val(data.gajiPokok);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Pangkat'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}



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
