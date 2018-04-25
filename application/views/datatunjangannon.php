<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tunjangan</h3>
            </div>
            <div class="box-body">
              <button class="btn btn-success" onclick="add_tunjangan()"><i class="glyphicon glyphicon-plus"></i> Add Tunjangan</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:13%;">ID</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th style="width:155px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Jabatan</th>
                  <th>Gaji Pokok</th>
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

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "scrollX": true,
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('tunjangannon/ajax_list')?>",
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
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

});



function add_tunjangan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add tunjangan'); // Set Title to Bootstrap modal title
}

function edit_tunjangan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('tunjangannon/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="kdJabatanNon"]').val(data.kdJabatanNon);
            $('[name="cbJabatanNon"]').val(data.namaJabatanNon);
            $('[name="gajiPokok"]').val(data.gajiPokok);
            $('#modal_form_edit').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit tunjangan'); // Set title to Bootstrap modal title

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
    document.location.href = 'tunjangannon';
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('tunjangannon/ajax_add')?>";
    } else if (save_method == 'update') {
        url = "<?php echo site_url('tunjangannon/ajax_update')?>";
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
      url = "<?php echo site_url('tunjangannon/ajax_update')?>";
    } else if (save_method == 'add') {
      url = "<?php echo site_url('tunjangannon/ajax_add')?>";
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

function delete_tunjangan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('tunjangannon/ajax_delete')?>/"+id,
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
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Pangkat</label>
                        <div class="col-md-9">
                        <select class="form-control" name="cbJabatanNon" id="cbJabatanNon">
                          <option>Pilih Jabatan</option>
                          <?php foreach($jabatannon->result_array() as $row) {?>
                            <option name="cbJabNon" id="cbJabNon" value="<?php echo $row['kdJabatanNon'];?>">
                            <?php echo $row['namaJabatanNon']?>
                            </option>
                          <?php }?>
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji Pokok</label>
                            <div class="col-md-9">
                                <input name="gajiPokok" placeholder="Gaji Pokok" class="form-control" type="text">
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
                    <input type="hidden" value="" name="id"/>
                    <input type="hidden" value="" name="kdJabatanNon" id="kdJabatanNon"/>
                    <div class="form-body">
                      <div class="form-group">
                        <label class="control-label col-md-3">Pangkat</label>
                        <div class="col-md-9">
                          <input name="cbJabatanNon" id="cbJabatanNon" class="form-control" type="text" readonly>
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji Pokok</label>
                            <div class="col-md-9">
                                <input name="gajiPokok" placeholder="Gaji Pokok" class="form-control" type="text">
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
