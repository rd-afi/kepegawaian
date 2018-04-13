<?php
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<?php foreach($tampil_nip->result_array() as $row) {?>
<div class="box-body">
  <form action="<?php echo base_url(). 'akun/tambah'; ?>" method="post">
                <div class="form-group">
                  <label >User Name</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['nip'];?>" readonly>
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $row['nip'];?>">
                </div>
			<div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="role" id="role" value="0" checked>
                    Admin
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="role" id="role" value="1" required="">
                      Pegawai Negeri Sipil
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="role" id="role" value="2" required="">
                      Non PNS
                    </label>
                  </div>

				  </div>
              <input type="submit" class="btn btn-success btn pull-right" value="simpan" name="simpan">

                </div>
              </form>




<?php }?>

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
