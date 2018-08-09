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
        LAPORAN GAJI NON-PNS PER-BULAN
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan gaji per-bulan</li>
    </ol>
</section>

<section class="content">
  <!-- Input addon -->
  <div class="box box-info">
    <div class="box-header">
      <!-- <h3 class="box-title">Input Addon</h3> -->
    </div>
    <div class="box-body">
      <div class="card-body">
        <center>
        <form action="<?php echo site_url('akun/laporanBulananNon')?>" class="form-inline" method="POST">
            <div class="form-group">
                <label for="bulan">&nbsp&nbsp&nbsp&nbsp Bulan &nbsp&nbsp&nbsp&nbsp </label>
                <select name="bulan" class="form-control">
                    <option selected="" disabled="">Pilih Bulan</option>
                    <?php
                        for($i=1;$i<=12;$i++){
            							if($i == date('m')){
            							echo '<option selected="" value="'.get_monthname($i).'">'.get_monthname($i).'</option>';
            							}else{
            							echo '<option value="'.get_monthname($i).'">'.get_monthname($i).'</option>';
            							}
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">&nbsp&nbsp&nbsp&nbsp Tahun &nbsp&nbsp&nbsp&nbsp</label>
                 <select name="tahun" class="form-control">
                    <option selected="" disabled="">Pilih Tahun</option>
                    <?php
						for($i=2017;$i<=date("Y");$i++){
							if($i == date('Y')){
							echo '<option selected="" value="'.$i.'">'.$i.'</option>';
							}else{
							echo '<option value="'.$i.'">'.$i.'</option>';
							}
						}
					?>
                </select>
            </div>
            &nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary">View</button>
        </form>
        </center>
    </div>
      <br/>

    </div><!-- /.box-body -->
  </div><!-- /.box -->

  <div class="nav-tabs-custom">
    <!-- <div class="input-group margin pull-right">
    <div class="input-group-btn pull-right">
      <button type="button" class="btn btn-default dropdown-toggle pull-right" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>
        <ul class="dropdown-menu">
          <li>
            <a href="<?php echo base_url(); ?>"><i class="fa fa-download"></i> Unduh</a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="<?php echo base_url('akun'); ?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Print</a>
          </li>
        </ul>
    </div>
    </div> -->
    <!-- <br>
    <br> -->
    <!-- TAB 1 -->
    <div class="tab-content">
        <div class="box-body">
      		<h4 align = 'center'>Laporan Gaji</h4>
      		<center><h4> Periode  <?php echo $bulan.' '.$tahun ?></h4></center>
          <table class="table table-striped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Pangkat</th>
                <th>Kehadiran</th>
                <th>Total Gaji</th>
              </tr>
            </thead>
            <tbody>
              <?php
              function rupiah($angka){
    	           $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
                 return $hasil_rupiah;
              }
              foreach($data as $u){ ?>
              <tr>
                <td><?php echo $u->kdPegawai ?></td>
                <td><?php echo $u->nama ?></td>
                <td><?php echo $u->namaJabatanNon ?></td>
                <td><?php echo $absen = $u->absen; ?></td>
                <td><?php

                $gajiPokok = $u->gajiPokok;
                $gajiHarian = $gajiPokok / 22;
                $totalGaji = (($gajiHarian*$absen)-64000);
                echo rupiah($totalGaji);?>
                </td>
              </tr>
              <?php
              } ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4"  style="background-color:#ededed;">Total</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- END TAB 1 -->
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
    // $('#myTable').DataTable();
   //  function addCommas(nStr) {
   //     nStr += '';
   //     x = nStr.split('.');
   //     x1 = x[0];
   //     x2 = x.length > 1 ? ',' + x[1] : '';
   //     var rgx = /(\d+)(\d{3})/;
   //     while (rgx.test(x1)) {
   //             x1 = x1.replace(rgx, '$1' + '.' + '$2');
   //     }
   //     return x1 + x2;
   // }
   function setView() {
     var bulan = document.getElementById("bulan");
     document.getElementById("judul").innerHTML = bulan.value;
   }
  function Rp(angka) {
    var	number_string = angka.toString(),
  	split	= number_string.split(','),
  	sisa 	= split[0].length % 3,
  	rupiah 	= split[0].substr(0, sisa),
  	ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
    	separator = sisa ? '.' : '';
    	rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
   }
    $('#myTable').DataTable( {
      dom: 'Brti',
         buttons: [{ extend: 'copy', footer: true, title : 'Laporan Gaji Bulan <?php echo $bulan.' '.$tahun ?>'  },
          { extend: 'excel', footer: true, title : 'Laporan Gaji Bulan <?php echo $bulan.' '.$tahun ?>'  },
          { extend: 'pdf', footer: true, title : 'Laporan Gaji Bulan <?php echo $bulan.' '.$tahun ?>'  },
          { extend: 'print', footer: true, title : 'Laporan Gaji Bulan <?php echo $bulan.' '.$tahun ?>' }],
       // "paging" : false,
       // "searching" : false,
       "footerCallback": function ( row, data, start, end, display ) {
           var api = this.api(), data;

           // Remove the formatting to get integer data for summation
           var intVal = function ( i ) {
               return typeof i === 'string' ?
                   i.replace(/[\Rp.,]/g, '')*1 :
                   typeof i === 'number' ?
                       i : 0;
           };

           // Total over all pages
           total = api
               .column( 4 )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
          // total = addCommas(total);
          total = Rp(total);

           // Total over this page
           pageTotal = api
               .column( 4, { page: 'current'} )
               .data()
               .reduce( function (a, b) {
                   return intVal(a) + intVal(b);
               }, 0 );
          // pageTotal = addCommas(pageTotal);
          // pageTotal = addCommas(pageTotal);
          pageTotal = Rp(pageTotal);
           // Update footer
           $( api.column( 4 ).footer() ).html(
               // 'Rp. '+pageTotal+' </br> ( Rp. '+ total +' total)'
               '( Rp. '+ total +' )'
           );
       }
   } );

    // $("#bulan").datepicker( {
    //   format: "MM - yyyy",
    //   startView: "months",
    //   startDate: "January - 2017",
    //   endDate: "today",
    //   minViewMode: "months"
    // });

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
