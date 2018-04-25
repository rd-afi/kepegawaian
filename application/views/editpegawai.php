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
              <li><a href="#tab_2" data-toggle="tab">Riwayat Pendidikan</a></li>
              <li><a href="#tab_3" data-toggle="tab">Data Keluarga</a></li>
              <li><a href="#tab_4" data-toggle="tab">Upload File Penunjang</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php foreach($pegawai as $u){ ?>
                <div class="box-body">
                  <form action="<?php echo base_url(). 'datapegawai/ubah'; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-xs-3">
                            <label>Nomor Induk Pegawai</label>
                            <input type="text" name="nip" id="nip" class="form-control" value="<?php echo $u->nip?>">
                        </div>
                        <div class="form-group col-xs-5">
                            <label>Nama Pegawai</label>
                            <input type="text" name="namaPegawai" id="namaPegawai" class="form-control" value="<?php echo $u->namaPegawai?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <label>Tempat</label>
                            <input type="text" name="tempat" id="tempat" class="form-control" value="<?php echo $u->tempat ?>">
                        </div>
                        <div class="col-xs-2">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date">
                                <input type="text" name="ttl" class="form-control" id="ttl" value="<?php echo date('d-m-Y', strtotime($u->tglLahir));?>">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                          <label>Agama</label>
                          <div class="form-group">
                            <select class="form-control" name="cbAgama" id="cbAgama" >
                              <option value="Islam" <?php echo ($u->agama=='Islam')?'selected':'' ?>>Islam</option>
                              <option value="Kristen" <?php echo ($u->agama=='Kristen')?'selected':'' ?>>Kristen</option>
                              <option value="Katolik" <?php echo ($u->agama=='Katolik')?'selected':'' ?>>Katolik</option>
                              <option value="Hindu" <?php echo ($u->agama=='Hindu')?'selected':'' ?>>Hindu</option>
                              <option value="Budha" <?php echo ($u->agama=='Budha')?'selected':'' ?>>Budha</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-5">
                          <label>Jenis Kelamin</label>
                          <div class="form-group">
                            <div class="radio">
                              <label>
                                <input type="radio" name="rbJk" id="lk" class="flat-blue" value="Laki-Laki" <?php echo ($u->jk=='Laki-Laki')?'checked':'' ?>>
                                Laki-Laki
                              </label>
                              <label>
                                <input type="radio" name="rbJk" id="pr" class="flat-blue" value="Perempuan" <?php echo ($u->jk=='Perempuan')?'checked':'' ?>>
                                Perempuan
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                          <label>Alamat</label>
                          <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $u->alamat?>">
                        </div>
                        <div class="col-xs-3">
                          <label>Telepon</label>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $u->telepon?>">
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
                              <option name="cbJab" id="cbJab" value="<?php echo $row['kdPangkat'];?>" <?php if($row['kdPangkat']==$u->kdPangkat){?> selected <?php } ?> >
                              <?php echo $row['namaPangkat']?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-2">
                          <label>TMT Pangkat</label>
                          <div class="input-group date">
                              <input type="text" name="tmtPang" id="tmtPang" class="form-control" id="tmtPang" value="<?php echo date('d-m-Y', strtotime($u->tmtPangkat));?>">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
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
                              <option name="cbJab" id="cbJab" value="<?php echo $row['kdJabatan'];?>" <?php if($row['kdJabatan']==$u->kdJabatan){?> selected <?php } ?> >
                              <?php echo $row['namaJabatan']?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-2">
                          <label>TMT Pangkat</label>
                          <div class="input-group date">
                              <input type="text" name="tmtJab" class="form-control" id="tmtJab" value="<?php echo date('d-m-Y', strtotime($u->tmtJabatan));?>">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-2">
                          <label>Mulai Jabatan</label>
                          <div class="input-group date">
                              <input type="text" name="mulJab" class="form-control" id="mulJab" value="<?php echo date('d-m-Y', strtotime($u->mulaiJabatan));?>">
                              <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                              </div>
                          </div>
                      </div>
                  </div>

                </div> <!-- BOX BODY -->
                <?php } ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-xs-4">
                      <label>Nama Tempat Pendidikan</label>
                      <input type="text" name="namaPendidikan" id="namaPendidikan" class="form-control" value="<?php echo $u->namaPendidikan?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-2">
                      <label>Tahun</label>
                      <input type="number" name="tahunPendidikan" id="tahunPendidikan" class="form-control" value="<?php echo $u->tahunPendidikan?>" placeholder="contoh : 2002">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-4">
                      <label>Ijasah</label>
                      <input type="text" name="ijasah" id="ijasah" class="form-control" value="<?php echo $u->Ijasah?>" placeholder="contoh : S3 Administrasi Pendidikan">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="box-body">
                  <div class="row">
                    <div class="form-group col-xs-4">
                      <label>NIP Suami</label>
                      <input type="text" name="nipSuami" id="nipSuami" class="form-control" value="<?php echo $u->nipSuami?>">
                    </div>
                    <div class="form-group col-xs-4">
                      <label>NIP Istri</label>
                      <input type="text" name="nipIstri" id="nipIstri" class="form-control" value="<?php echo $u->nipIstri?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-4">
                      <label>Nama Suami</label>
                      <input type="text" name="namaSuami" id="namaSuami" class="form-control" value="<?php echo $u->namaSuami?>">
                    </div>
                    <div class="form-group col-xs-4">
                      <label>Nama Istri</label>
                      <input type="text" name="namaIstri" id="namaIstri" class="form-control" value="<?php echo $u->namaIstri?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-xs-4">
                      <label>Jumlah Anak</label>
                      <input type="number" name="jmlAnak" id="jmlAnak" class="form-control" value="<?php echo $u->jmlAnak?>">
                      <!-- <textarea class="form-control" rows="5" placeholder="1. ......... | Laki-Laki | 2. ......... | Perempuan"></textarea> -->
                    </div>
                  </div>
                  <div class="row">
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
                4
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
