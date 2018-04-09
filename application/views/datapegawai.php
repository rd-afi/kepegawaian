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
        <li class="active">Data Pegawai</li>
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
                <th>Username</th>
                <th>Pangkat</th>
                <th>TMT</th>
                <th>Jabatan</th>
                <th>TMT</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->nip ?></td>
                <td><?php echo $u->namaPegawai ?></td>
                <td><?php echo $u->namaPangkat ?></td>
                <td><?php echo date('d-m-Y', strtotime($u->tmtPangkat));?></td>
                <td><?php echo $u->namaJabatan ?></td>
                <td><?php echo date('d-m-Y', strtotime($u->tmtJabatan));?></td>
                <td><?php echo date('d-m-Y', strtotime($u->mulaiJabatan));?></td>
                <td><a class="btn btn-sm btn-primary" title="Detail" href="datapegawai/detail/<?php echo $u->nip ?>">Detail</a></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Pangkat</th>
                <th>TMT</th>
                <th>Jabatan</th>
                <th>TMT</th>
                <th>Status</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
      </div>
      <!-- TAB 2 -->
      <div class="tab-pane" id="tab_2">
        <h3>TAMBAH DATA PEGAWAI</h3>
        <div class="box-body">
          <form action="<?php echo base_url(). 'datapegawai/tambah'; ?>" method="post">
            <div class="row">
              <div class="form-group col-xs-3">
                <label>Nomor Induk Pegawai</label>
                <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP">
              </div>
              <div class="form-group col-xs-5">
                <label>Nama Pegawai</label>
                <input type="text" name="namaPegawai" id="namaPegawai" class="form-control" placeholder="Nama Pegawai">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                  <label>Tempat</label>
                  <input type="text" name="tempat" id="tempat" class="form-control" placeholder="Tempat">
              </div>
              <div class="col-xs-2">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date">
                      <input type="text" name="ttl" class="form-control" id="ttl" placeholder="dd-mm-yyyy">
                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                  </div>
              </div>
              <div class="col-xs-2">
                <label>Agama</label>
                <div class="form-group">
                  <select class="form-control" name="cbAgama" id="cbAgama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                  </select>
                </div>
              </div>
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
              <div class="col-xs-4">
                <label>Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat ...">
              </div>
              <div class="col-xs-3">
                <label>Telepon</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="text" name="telepon" id="telepon" class="form-control" placeholder="0812...">
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xs-3">
                <label>Pangkat, Gol/ruang</label>
                <div class="form-group">
                  <select class="form-control" name="cbPangkat" id="cbPangkat">
                    <option>Pilih Pangkat, Gol/ruang</option>
                    <?php foreach($pangkat->result_array() as $row) {?>
                      <option name="cbPang" id="cbPang" value="<?php echo $row['kdPangkat'];?>">
                      <?php echo $row['namaPangkat']?>
                      </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <label>TMT Pangkat</label>
                <div class="input-group date">
                  <input type="text" name="tmtPang" id="tmtPang" class="form-control" id="tmtPang" placeholder="dd-mm-yyyy">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-3">
                <label>Jabatan</label>
                <div class="form-group">
                  <select class="form-control" name="cbJabatan" id="cbJabatan">
                    <option>Pilih Jabatan</option>
                    <?php foreach($jabatan->result_array() as $row) {?>
                      <option name="cbJab" id="cbJab" value="<?php echo $row['kdJabatan'];?>">
                      <?php echo $row['namaJabatan']?>
                      </option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="col-xs-2">
                <label>TMT Jabatan</label>
                  <div class="input-group date">
                    <input type="text" name="tmtJab" class="form-control" id="tmtJab" placeholder="dd-mm-yyyy">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                  </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-2">
                <label>Mulai Jadi Pegawai</label>
                  <div class="input-group date">
                    <input type="text" name="mulJab" class="form-control" id="mulJab" placeholder="dd-mm-yyyy">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>
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
