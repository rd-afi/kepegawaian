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
                    <div class="row">
                      <div class="form-group col-xs-5">
                          <label>Alamat</label>
                          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $u->alamat?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-3">
                        <label>Jenjang Pendidikan</label>
                        <div class="form-group">
                          <select class="form-control" name="jenjang" id="jenjang">
                            <option>Pilih Jenjang</option>
                            <option name="jen" id="jen" value="Tidak Sekolah" <?php if('Tidak Sekolah'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'Tidak Sekolah';?></option>
                            <option name="jen" id="jen" value="SD" <?php if('SD'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'SD';?></option>
                            <option name="jen" id="jen" value="SMP" <?php if('SMP'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'SMP';?></option>
                            <option name="jen" id="jen" value="SMA" <?php if('SMA'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'SMA';?></option>
                            <option name="jen" id="jen" value="D1" <?php if('D1'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'D1';?></option>
                            <option name="jen" id="jen" value="D2" <?php if('D2'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'D2';?></option>
                            <option name="jen" id="jen" value="D3" <?php if('D3'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'D3';?></option>
                            <option name="jen" id="jen" value="D4" <?php if('D4'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'D4';?></option>
                            <option name="jen" id="jen" value="S1" <?php if('S1'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'S1';?></option>
                            <option name="jen" id="jen" value="S2" <?php if('S2'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'S2';?></option>
                            <option name="jen" id="jen" value="S3" <?php if('S3'==$u->jenjang_pendidikan){?> selected <?php } ?> >
                            <?php echo 'S3';?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-3">
                        <label>Status Perkawinan</label>
                        <div class="form-group">
                          <select class="form-control" name="perkawinan" id="perkawinan">
                            <option>Pilih Status</option>
                            <option name="statper" id="statper" value="Lajang" <?php if('Lajang'==$u->status_perkawinan){?> selected <?php } ?> >
                            <?php echo 'Lajang';?></option>
                            <option name="statper" id="statper" value="Sudah" <?php if('Sudah'==$u->status_perkawinan){?> selected <?php } ?> >
                            <?php echo 'Sudah';?></option>
                            <option name="statper" id="statper" value="Belum" <?php if('Belum'==$u->status_perkawinan){?> selected <?php } ?> >
                            <?php echo 'Belum';?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-5">
                          <label>Suami</label>
                          <input type="text" name="suami" id="suami" class="form-control" value="<?php echo $u->suami?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-5">
                          <label>Istri</label>
                          <input type="text" name="istri" id="istri" class="form-control" value="<?php echo $u->istri?>">
                      </div>
                    </div>

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
