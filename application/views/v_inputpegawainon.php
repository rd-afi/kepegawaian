<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<div class="box-body">
                <div class="form-group">
                  <label >Kode Pegawai</label>
                  <input  class="form-control" id="" name="kdPegawai" value="<?php echo $kd_pegawai?>">
                </div>
                <div class="form-group">
                  <label >Nama</label>
                  <input  class="form-control" id=""  name="nama">
                </div>
				<div class="form-group">
                  <label >Jabatan</label>
                  <input  class="form-control" id="" name="jabatan">
                </div>	  
				  </div>
              <input type="submit" class="btn btn-success btn pull-right" value="simpan" name="simpan"> 
           
                </div>
            
           




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
