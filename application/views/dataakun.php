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
        DATA PEGAWAI
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Akun</li>
    </ol>
</section>

<section class="content">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab">Tabel Data Akun</a></li>
      <li><a href="#tab_2" data-toggle="tab">Tambah Akun</a></li>
      <?php
      // echo $this->session->userdata('pesan_sukses');
      ?>
    </ul>
    <?php
    // $pesan = $this->session->flashdata('pesan_sukses');
    $tmpuname = $this->session->flashdata('tmpuname');
    $tmppass = $this->session->flashdata('tmppass');
    if($this->session->userdata('tmpuname') != ""){
      ?>
      <script type="text/javascript">
        swal("Mohon Informasikan", "<?php echo 'Username : '.$this->session->userdata('tmpuname').
              '\n Password : '.$this->session->userdata('tmppass'); ?>", "warning");
      </script>
      <?php
      }
     ?>
    <!-- TAB 1 -->
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <div class="box-body">
          <table class="table table-striped table-bordered table-hover" id="tableakun">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>

                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
      </div>
      <!-- TAB 2 -->
      <div class="tab-pane" id="tab_2">
        <!-- <h3>TAMBAH DATA PEGAWAI</h3> -->
        <div class="box-body">
          <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <!-- TAMBAH AKUN PEGAWAI PNS -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Tambah Akun Pegawai PNS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <table class="table table-striped table-bordered" id="tabelpns">
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
                          <?php foreach($akunPegawai as $u){ ?>
                          <tr>
                            <td>
                              <?php echo $u->nip ?>
                              <input type="hidden" id="uname" name="uname" value="<?php echo $u->nip ?>"/>
                            </td>
                            <td><?php echo $u->namaPegawai ?></td>
                            <td><?php echo $u->namaPangkat ?></td>

                            <td><a class="btn btn-sm btn-primary" title="Buat Akun" onclick="addAkunPegawai('<?php echo $u->nip ?>')">Buat Akun</a></td>
                            <!-- <td><a class="btn btn-sm btn-primary" title="Buat Akun" onclick="buatAkunPegawai(".'"'.<?php echo $u->nip ?>.'"'.")">Buat Akun</a></td> -->
                            <!-- onclick="edit_pangkat('."'".$pangkat->kdPangkat."'".')" -->
                          </tr
                          <?php } ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <!-- TAMBAH AKUN PEGAWAI NON-PNS -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Tambah Akun Pegawai Non-PNS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      <table class="table table-striped table-bordered" id="tabelnon">
                        <thead>
                          <tr>
                            <tr>
                            <th>Kode Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($akunPegawaiNon as $u){ ?>
                          <tr>
                            <td>
                              <?php $kdPegawai = $u->kdPegawai; echo $kdPegawai  ?>
                              <input type="hidden" id="nuname" name="nuname" value="<?php echo $kdPegawai ?>"/>
                            </td>
                            <td><?php echo $u->nama ?></td>
                            <td><?php echo $u->namaJabatanNon ?></td>

                            <td><a class="btn btn-sm btn-primary" title="Buat Akun" onclick="addAkunNonPegawai('<?php echo $kdPegawai; ?>')">Buat Akun</a></td>
                          </tr
                          <?php } ?>
                        </tbody>
                        <tfoot>

                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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

<script type="text/javascript">

  function addAkunPegawai($nip)
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#Pegawai').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Akun'); // Set Title to Bootstrap modal title
    $('#username').val($nip);
    $('#password').val($nip);
    // $('#username').val($('#uname').val());
    // $('#password').val($('#uname').val());
  }

  function addAkunNonPegawai($kdPegawai)
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#NonPegawai').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Akun'); // Set Title to Bootstrap modal title
    $('#nusername').val($kdPegawai);
    $('#npassword').val($kdPegawai);
    // $('#nusername').val($('#nuname').val());
    // $('#npassword').val($('#nuname').val());
    // alertify.alert("Username : ".$('#nusername').val()."<br>".."Password : ".$('#npassword').val()."<br>");
  }

  function ubahDataAkun(username)
  {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      $('.form-group').removeClass('has-error'); // clear error class
      $('.help-block').empty(); // clear error string

      //Ajax Load data from ajax
      $.ajax({
          url : "<?php echo site_url('akun/ajax_edit/')?>" + username,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {

              $('[name="eusername"]').val(data.username);
              $('[name="epassword"]').val(data.password);
              if (data.role == 0) {
                $('[name="erole"]').val("Admin");
              } else if (data.role == 1) {
                $('[name="erole"]').val("Pegawai");
              } else {
                $('[name="erole"]').val("Non-Pegawai");
              }
              if (data.status == '1'){
                $('[name="cbStatus"]').val('Aktif');
              } else {
                $('[name="cbStatus"]').val('Non-Aktif');
              }
              $('#modal_ubah').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Edit Pangkat'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }

  function save()
  {
      $('#btnSave').text('Menyimpan...'); //change button text
      $('#btnSave').attr('disabled',true); //set button disable
      var url;

      url = "<?php echo site_url('akun/ajax_update')?>";

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
                  $('#modal_ubah').modal('hide');
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


  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax
  }

  function showpass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function showpassn() {
    var x = document.getElementById("npassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function lihatpass() {
    var x = document.getElementById("epassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function delete_akun(username)
  {
      if(confirm('Are you sure delete this data?'))
      {
          // ajax delete data to database
          $.ajax({
              url : "<?php echo site_url('akun/ajax_delete')?>/"+username,
              type: "POST",
              dataType: "JSON",
              success: function(data)
              {
                  //if success reload ajax table
                  // redirect('akun');
                  // $('#modal_ubah').modal('hide');
                  reload_table();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert('Error deleting data');
              }
          });

      }
  }

  $(document).ready(function(){
    $('#tabelpns').DataTable({"pageLength": 5 });
    $('#tabelnon').DataTable({"pageLength": 5 });
    table = $('#tableakun').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('akun/ajax_list')?>",
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

  });

</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="Pegawai" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Akun</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url(). 'akun/tambahAkunPegawai'; ?>" id="formpegawai" class="form-horizontal" method="post">
                    <!-- <input type="hidden" value="" name="nip"/> -->
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="username" id="username" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                              <div class="input-group">
                                <input name="password" id="password" type="password" class="form-control">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-info" onclick="showpass()"><i class="fa fa-eye"></i></button>
                                </span>
                              </div>
                            </div>
                        </div>
                        <input name="role" id="role" type="hidden" class="form-control" value="1">
                    </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success btn pull-right" value="Simpan Akun" name="simpan">
            </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- TAMBAH AKUN NON-PNS -->
<!-- Bootstrap modal -->
<div class="modal fade" id="NonPegawai" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah Akun</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url(). 'akun/tambahAkunNonPegawai'; ?>" id="formnonpegawai" class="form-horizontal" method="post">
                    <!-- <input type="hidden" value="" name="nip"/> -->
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="nusername" id="nusername" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                              <div class="input-group">
                                <input name="npassword" id="npassword" type="password" class="form-control">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-info" onclick="showpassn()"><i class="fa fa-eye"></i></button>
                                </span>
                              </div>
                            </div>
                        </div>
                        <input name="nrole" id="nrole" type="hidden" class="form-control" value="2">
                    </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success btn pull-right" value="Simpan Akun" name="simpan">
            </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->



<!-- ACTION UBAH -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_ubah" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ubah Akun</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url(). 'akun/ubah'; ?>" id="form" class="form-horizontal" method="post">
                    <!-- <input type="hidden" value="" name="nip"/> -->
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input name="eusername" id="eusername" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                              <div class="input-group">
                                <input name="epassword" id="epassword" type="password" class="form-control">
                                <span class="input-group-btn">
                                  <button type="button" class="btn btn-info" onclick="lihatpass()"><i class="fa fa-eye"></i></button>
                                </span>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-9">
                                <input name="erole" id="erole" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                              <select class="form-control" name="cbStatus" id="cbStatus">
                                <option name="cbaktif" id="cbaktif">Aktif</option>
                                <option name="cbnonaktif" id="cbnonaktif">Non-Aktif</option>
                              </select>
                                <!-- <input name="estatus" id="estatus" class="form-control" type="text"> -->
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-success btn pull-right">Simpan</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
