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
        MASTER PROGRAM
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penyerahan Waste Produksi</li>
    </ol>
</section>

<!-- Main content -->
<div class="container" style="width: 800px; margin-top: 50px;">
            <table class="table">
                <h2 class="text-center py-3">Penyerahan Waste Produksi</h2>
               <!--  <form action="<?php echo base_url(); ?>index.php/Penyerahan_waste_produksi/tiga_penyerahan_waste_produksi" method="get"> -->
                    <thead>
                        <tr>
                            <th>Nama Waste</th>
                            <th>Jenis Waste</th>
                            <th>Bagian</th>
                            <th>Tanggal Waste Produksi</th>
                            <th>Jumlah Karung</th>
                            <th>Jumlah Kg</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        foreach ($input_data as $key => $value)
                        {
                        ?>
                        <tr>
                            <?php
                            //Panggil Function sesuai di controller

                            //dari tanda tanya html tanggal berubah menjadi varibel tanggal dari cotroller yang menerima data halaman sebelumnnya 
                            ?>
                            <td><a href="<?php echo base_url ();?>index.php/Penyerahan_waste_produksi/pengeluaran_data?tanggal=<?php echo $tanggal ?>&nama_waste=<?php echo $value->nama_waste ?>&jenis_waste=<?php echo $value->jenis_waste ?>&bagian=<?php echo $value->bagian ?>&asal_waste=<?php echo $value->asal_waste ?>"><?php echo $value->nama_waste; ?></a></td>
                            <td><?php echo $value->jenis_waste; ?></td>
                            <td><?php echo $value->bagian; ?></td>
                            <td><?php echo $value->tanggal; ?></td>
                            <td><?php echo $value->jml_karung; ?></td>
                            <td><?php echo $value->berat; ?></td>
                            

                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
               <!--  </form> -->
            </table>
        </div>


            


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