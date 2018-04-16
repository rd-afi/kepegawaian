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
      <!--<li class="active"><a href="#tab_1" data-toggle="tab">Tabel Data Akun</a></li>
     <!-- <li><a href="#tab_2" data-toggle="tab">Tambah Akun</a></li>
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
                <th>Password</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach($data as $u){ ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $u->username ?></td>
                <td>
                  <button class="btn btn-sm btn-primary" type="button" id="eye" onclick="lihatpass()">
                      <i class="fa fa-eye"></i>
                  </button>
                </td>
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
                  $status = '<a class="btn btn-sm bg-red" title="Klik untuk Aktifkan" href="datapegawai/detail/'. $u->username .'">Non-Aktif</a>';
                } else {
                  $status = '<a class="btn btn-sm bg-orange" title="Klik untuk Non-Aktifkan" href="datapegawai/detail/'. $u->username .'">Aktif</a>';
                }
                echo $status ?></td>
                <td><a class="btn btn-sm bg-olive" title="Detail" href="datapegawai/detail/<?php echo $u->username ?>">Ubah</a></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
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
     <!-- <div class="tab-pane" id="tab_2">
        <!-- <h3>TAMBAH AKUN</h3> -->
		<!-- <table class="table table-striped table-bordered" id="myTable">
        <div class="box-body">
		 <thead>
              <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Pangkat</th>
				<th>Aksi</th>
              </tr>
            </thead>
           <tbody>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->nip ?></td>
                <td><?php echo $u->namaPegawai ?></td>
                <td><?php echo $u->namaPangkat ?></td>
                <td><a class="btn btn-sm btn-primary" title="Detail" href="akun/tambahacc/<?php echo $u->nip ?>">Tambah Akun</a></td>
              </tr>
              <?php } ?>
			</tbody>

        </div>
		</table>
      </div> -->
       <!--END TAB 2 -->
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

  $(document).ready(function(){
    $('#myTable').DataTable();

    function edit_pangkat(kdPangkat)
    {
        ('[name="password"]').val(data.password);
        ('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        ('.modal-title').text('Lihat Password'); // Set title to Bootstrap modal title
    }

  });
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
                    <input type="hidden" value="" name="kdPangkat"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Pangkat</label>
                            <div class="col-md-9">
                                <input name="namaPangkat" placeholder="Nama Pangkat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Gaji Pokok</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="gajiPokok" placeholder="Gaji Pokok" class="form-control" type="number">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
