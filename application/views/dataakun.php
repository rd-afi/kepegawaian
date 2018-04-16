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
    </ul>
    <!-- TAB 1 -->
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <div class="box-body">
          <table class="table table-striped table-bordered table-hover" id="myTable">
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
              <?php $i = 1; foreach($data as $u){ ?>
              <tr>
                <td><?php echo $i ?>
                  <input type="hidden" id="vuname" name="vuname" value="<?php echo $username = $u->username ?>"/>
                  <input type="hidden" id="vpass" name="vpass" value="<?php echo $u->password ?>"/>
                  <input type="hidden" id="vrole" name="vrole" value="<?php echo $u->role ?>"/>
                  <input type="hidden" id="vstatus" name="vstatus" value="<?php echo $u->status ?>"/>
                </td>
                <td><?php echo $u->username ?></td>
                <td><?php
                $role = $u->role;
                if ($role == 0) {
                  $role = 'Admin';
                } elseif ($role == 1) {
                  $role = 'Pegawai';
                } elseif ($role == 2) {
                  $role = 'Non-Pegawai';
                } else {
                  $role = '---';
                }
                echo $role ?></td>
                <td><?php
                $status = $u->status;
                if ($status == 0) {
                  $status = '<a class="btn btn-sm bg-red">Non-Aktif</a>';
                } else {
                  $status = '<a class="btn btn-sm bg-orange">Aktif</a>';
                }
                echo $status ?></td>
                <td>
                  <a class="btn btn-sm btn-primary" title="Ubah Data Akun" onclick="ubahDataAkun()">Ubah Data</a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url(). 'akun/hapus/' . $u->username; ?>"
                    onclick="javascript: return confirm('Anda yakin hapus ?')"> Hapus <i class="glyphicon glyphicon-trash"></i></a>
                </td>
              </tr>
              <?php $i++; } ?>
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
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <!-- TAMBAH AKUN ADMIN -->
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Tambah Akun Admin
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">

                    </div>
                  </div>
                </div>
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
                          <?php foreach($akunPegawai as $u){ ?>
                          <tr>
                            <td>
                              <?php echo $u->nip ?>
                              <input type="hidden" id="uname" name="uname" value="<?php echo $u->nip ?>"/>
                            </td>
                            <td><?php echo $u->namaPegawai ?></td>
                            <td><?php echo $u->namaPangkat ?></td>

                            <td><a class="btn btn-sm btn-primary" title="Buat Akun" onclick="addAkunPegawai()">Buat Akun</a></td>
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
                      <table class="table table-striped table-bordered" id="myTable">
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
                              <?php echo $u->kdPegawai ?>
                              <input type="hidden" id="nuname" name="nuname" value="<?php echo $u->kdPegawai ?>"/>
                            </td>
                            <td><?php echo $u->nama ?></td>
                            <td><?php echo $u->jabatan ?></td>

                            <td><a class="btn btn-sm btn-primary" title="Buat Akun" onclick="addAkunNonPegawai()">Buat Akun</a></td>
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

  function addAkunPegawai()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#Pegawai').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Akun'); // Set Title to Bootstrap modal title
    $('#username').val($('#uname').val());
    $('#password').val($('#uname').val());
  }

  function addAkunNonPegawai()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#NonPegawai').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Akun'); // Set Title to Bootstrap modal title
    $('#nusername').val($('#nuname').val());
    $('#npassword').val($('#nuname').val());
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



  $(document).ready(function(){
    $('#myTable').DataTable();

    tampil_data_akun();   //pemanggilan fungsi tampil barang.

        //fungsi tampil barang
        function tampil_data_akun(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/barang/data_barang',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].barang_kode+'</td>'+
                                '<td>'+data[i].barang_nama+'</td>'+
                                '<td>'+data[i].barang_harga+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].barang_kode+'">Edit</a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].barang_kode+'">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

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
                <form action="<?php echo base_url(). 'akun/tambahAkunPegawai'; ?>" id="form" class="form-horizontal" method="post">
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
                <form action="<?php echo base_url(). 'akun/tambahAkunNonPegawai'; ?>" id="form" class="form-horizontal" method="post">
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
<div class="modal fade" id="ubah" role="dialog">
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
                                <input name="eusername" id="eusername" class="form-control" type="text">
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
                                <input name="erole" id="erole" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <input name="estatus" id="estatus" class="form-control" type="text">
                            </div>
                        </div>
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
