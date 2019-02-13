<?php
$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Waste Produksi
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Waste Produksi</li>
    </ol>
</section>

<!-- Main content -->
<div class="container" style="width: 600px; margin-top: 50px;">
                <table class="table">
                    <h1 class="text-center">Waste Produksi</h1>
                    <br>
                    <form action="<?php echo base_url(); ?>index.php/Dashboard1/memasukan_data_halaman_dua_waste_produksi" method="post">
                       <tr>
                            <th>No</th>
                            <th>No.Karung</th>
                            <th>Shift</th>
                            <th>Berat (Kg)</th>
                        </tr>
                        <?php 
                        $no=1;
                        for ($i=0; $i < $jml_karung; $i++) { 
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><input type="text" class="form-control" name="no_karung[]" required></td>
                                <td><input type="text" class="form-control" name="shift[]" required></td>
                                <td><input type="text" class="form-control" name="kilogram[]" required></td>
                            </tr>
                            <?php
                        }
                         ?>
                         <tr>
                            <td><button type="submit" class="btn btn-primary" name="">Submit</button></td>
                         </tr>
                        <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>">
                        <input type="hidden" name="nama_waste" value="<?php echo $nama_waste; ?>">
                        <input type="hidden" name="asal_waste" value="<?php echo $asal_waste; ?>">
                        <input type="hidden" name="jumlah_karung" value="<?php echo $jml_karung; ?>">
                        
                        <!-- 
                        <input type="hidden" name="jenis_waste" value="<?php echo $jenis_waste; ?>"> -->


                         
                    </form>
                </table>
        </div>




    
    <!-- Main row -->


            <!-- Chat box -->
            
                    <!-- chat item -->
                    
                    <!-- chat item -->
                   

            

            <!-- quick email widget -->
            

            <!-- Map box -->
            

            <!-- Calendar -->
            


<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('template/foot');
?>