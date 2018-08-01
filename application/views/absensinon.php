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
        ABSENSI NON-PNS
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">ABSENSI NON-PNS</li>
    </ol>
</section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-info">
        <div class="box-header">
          <!-- <h3 class="box-title">Input Addon</h3> -->
        </div>
        <div class="box-body">
          <div class="card-body">
            <center>
            <!-- <form action="" id="someForm" class="form-inline" method="POST"> -->
            <form action="<?php echo site_url('akun/absensi_non')?>" class="form-inline" method="POST">
                <div class="form-group">
                    <label for="bulan">&nbsp&nbsp&nbsp&nbsp Bulan &nbsp&nbsp&nbsp&nbsp </label>
                    <select name="bulan" id="bulan" class="form-control">
                        <option selected="" disabled="">Pilih Bulan</option>
                        <?php
                            for($i=1;$i<=12;$i++){
                							if($i == date('m')){
                							echo '<option selected="" value="'.get_monthname($i).'">'.get_monthname($i).'</option>';
                							}else{
                							echo '<option value="'.get_monthname($i).'">'.get_monthname($i).'</option>';
                							}
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tahun">&nbsp&nbsp&nbsp&nbsp Tahun &nbsp&nbsp&nbsp&nbsp</label>
                     <select name="tahun" id="tahun" class="form-control">
                        <option selected="" disabled="">Pilih Tahun</option>
                        <?php
    						for($i=2017;$i<=date("Y");$i++){
    							if($i == date('Y')){
    							echo '<option selected="" value="'.$i.'">'.$i.'</option>';
    							}else{
    							echo '<option value="'.$i.'">'.$i.'</option>';
    							}
    						}
    					?>
                    </select>
                </div>
                &nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary">View</button>
                <!-- &nbsp&nbsp&nbsp&nbsp<button type="button" value="View" name="view" onclick="viewkan()" class="btn btn-primary">View</button> -->
            </form>
            </center>
        </div>
          <br/>

        </div><!-- /.box-body -->
      </div><!-- /.box -->


      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Absensi</h3>
            </div>
            <div class="box-body">
              <?php
              if ((get_monthnumber($bulan) > date('m')) && $tahun == date ('Y')) {
                $onoff = "disabled";
              } else if ((get_monthnumber($bulan) <= date('m')) || $tahun <= date('Y')){
                $onoff = " ";
              }?>
              <button class="btn btn-success" onclick="add_absensi()" <?php echo $onoff; ?>><i class="glyphicon glyphicon-plus"></i> Data Absensi</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <!-- /.box-header -->
            <h4 align = 'center'>Laporan Gaji</h4>
         		<center><h4> Periode  <?php echo $bulan.' '.$tahun ?></h4></center>
            <div class="box-body">
              <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:13%;">NO</th>
                        <th>Kode Pegawai</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Absensi</th>
                        <th style="width:155px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                  <th>NO</th>
                  <th>Kode Pegawai</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Absensi</th>
                  <th>Action</th>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.box-body -->

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

<script type="text/javascript">
var save_method; //for save method string
var table;

form=document.getElementById("someForm");
function viewkan() {
        form.action="<?php echo site_url('akun/absensi_non')?>";
        form.action="<?php echo site_url('akun/ajax_list_absensi_non')?>";
        form.submit();
}

$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "scrollX": true,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('akun/ajax_list_absensi_non')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",
    //     todayBtn: true,
    //     todayHighlight: true,
    // });
    //
    // $("#bulan").datepicker( {
    //   format: "MM - yyyy",
    //   startView: "months",
    //   startDate: "January - 2017",
    //   endDate: "today",
    //   minViewMode: "months"
    // });

});



function add_absensi()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Absensi'); // Set Title to Bootstrap modal title
}

function edit_absensi(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('akun/ajax_edit_absensi_non/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="no"]').val(data.no);
            $('[name="cbAbsensi"]').val(data.nama);
            $('[name="bulanku"]').val(data.bulan_tahun);
            $('[name="kehadiran"]').val(data.absen);
            $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kehadiran'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    // table.ajax.reload(null,false); //reload datatable ajax
    document.location.href = 'absensi_non';
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('akun/ajax_add_absensi_non')?>";
    } else if (save_method == 'update') {
        url = "<?php echo site_url('akun/ajax_update_absensi_non')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}


function save_update()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'update') {
      url = "<?php echo site_url('akun/ajax_update_absensi_non')?>";
    } else if (save_method == 'add') {
      url = "<?php echo site_url('akun/ajax_add_absensi_non')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form_update').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form_edit').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_absensi(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('akun/ajax_delete_absensi_non')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <!-- <input type="hidden" value="" name="id"/> -->
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Pegawai</label>
                        <div class="col-md-9">
                        <select class="form-control" name="cbAbsensi" id="cbAbsensi">
                          <option disabled selected>Nama Pegawai</option>
                          <?php foreach($absensi->result_array() as $row) {?>
                            <option name="cbAbs" id="cbAbs" value="<?php echo $row['kdPegawai'];?>">
                            <?php echo $row['nama']?>
                            </option>
                          <?php }?>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Bulan - Tahun</label>
                            <div class="col-md-9">
                                <!-- <input name="bulan" id="bulan" class="form-control" type="text"> -->
                                <input name="bulanku" id="bulanku" class="form-control" type="text"value="<?php echo $bulan." - ".$tahun; ?>" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Kehadiran</label>
                            <div class="col-md-9">
                                <input name="kehadiran" placeholder="Jumlah Kehadiran" class="form-control" type="number" max="23">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap edit modal -->
<div class="modal fade" id="modal_form_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form_update" class="form-horizontal">
                    <input type="hidden" value="" name="no"/>
                    <input type="hidden" value="" name="kdPegawai" id="kdPegawai"/>
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Nama Pegawai</label>
                        <div class="col-md-9">
                          <input name="cbAbsensi" id="cbAbsensi" class="form-control" type="text" readonly>
                          <!-- <select class="form-control" name="cbAbsensi" id="cbAbsensi">
                            <option>Nama Pegawai</option>
                            <?php foreach($absensi->result_array() as $row) {?>
                              <option name="cbAbs" id="cbAbs" value="<?php echo $row['kdPegawai'];?>">
                              <?php echo $row['nama']?>
                              </option>
                            <?php }?>
                          </select> -->
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Bulan - Tahun</label>
                            <div class="col-md-9">
                                <!-- <input name="bulan" class="form-control" type="text" readonly> -->
                                <input name="bulanku" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Jumlah Kehadiran</label>
                            <div class="col-md-9">
                                <input name="kehadiran" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_update()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>
