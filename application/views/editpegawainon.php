<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">EDIT PEGAWAI</h3>
    </div>
  </div>
  <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Profil Pegawai</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php foreach($pegawai as $u){ ?>
                <div class="box-body">
                  <form action="<?php echo base_url(). 'datapegawainon/ubah'; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label>Kode Non-Pegawai</label>
                            <input type="text" name="kdPegawai" id="kdPegawai" class="form-control" value="<?php echo $u->kdPegawai?>" readonly>
                        </div>
                        <div class="form-group col-xs-5">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $u->nama?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                          <label>Jenis Kelamin</label>
                          <div class="form-group">
                            <div class="radio">
                              <label>
                                <input type="radio" name="rbJk" id="lk" class="flat-blue" value="Laki-Laki" <?php echo ($u->jkNon=='Laki-Laki')?'checked':'' ?>>
                                Laki-Laki
                              </label>
                              <label>
                                <input type="radio" name="rbJk" id="pr" class="flat-blue" value="Perempuan" <?php echo ($u->jkNon=='Perempuan')?'checked':'' ?>>
                                Perempuan
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-3">
                        <label>Jabatan</label>
                        <div class="form-group">
                          <select class="form-control" name="cbJabatan" id="cbJabatan">
                            <option>Pilih Jabatan</option>
                            <?php foreach($jabatan->result_array() as $row) {?>
                              <option name="cbJab" id="cbJab" value="<?php echo $row['kdJabatanNon'];?>" <?php if($row['kdJabatanNon']==$u->kdJabatanNon){?> selected <?php } ?> >
                              <?php echo $row['namaJabatanNon']?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                    </div>
                  <hr>

                </div> <!-- BOX BODY -->
                <?php } ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            <div class="box-footer clearfix">
              <input type="submit" class="btn btn-primary btn pull-right" value="Simpan">
            </div><!-- /.box-footer-->
            </form>
          </div>
          <!-- nav-tabs-custom -->

</section><!-- /.content -->


<?php
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>

<script>
    $(function () {
      $('#tablePegawai').DataTable()

    })
    $(function () {
    //Date picker
        $('#ttl').datepicker({
          orientation: 'bottom',
          autoclose: true,
          format: 'dd-mm-yyyy'
        })
        $('#tmtPang').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy'
        })
        $('#tmtJab').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy'
        })
        $('#mulJab').datepicker({
          autoclose: true,
          format: 'dd-mm-yyyy'
        })
    });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass   : 'iradio_flat-blue'
        })
</script>
