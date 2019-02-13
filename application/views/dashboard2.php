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

<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Waste Produksi
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<div class="container" style="width: 500px; margin-top: 50px;">
                <table class="table">
                    <h1 class="text-center">Waste Produksi 2</h1>
                    <br>
                    <form action="<?php echo base_url(); ?>index.php/Bar_col/masuk_data" method="post">
                        <tr>
                            <th><label for="tanggal_terima">Tanggal</label></th>
                                <td><input type="date" id="tanggal_terima" name="tanggal_terima" class="form-control" value=""></td>
                        </tr>
                        <tr>
                            <th><label for="jenis_benang">Nama Waste</label></th>
                                <td>
                                    <select class="form-control" id="jenis_benang" style="width: px;" required name="jenis_benang">
                                        <option value="Pilih Jenis Benang"></option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="India">India</option>
                                        <option value="Amerika">Amerika</option>
                                </td>
                                    </select>
                        </tr>
                        <tr>
                            <th><label for="no_mixing">Asal Waste</label></th>
                                <td><input type="text" name="no_mixing" id="no_mixing" class="form-control" required autofocus maxlength="20" placeholder="Input Asal Waste"></td>
                        </tr>
                        <tr>
                            <th><label for="jumlah_cones">Jumlah Karung</label></th>
                                <td><input type="number" name="jumlah_cones" id="jumlah_cones" class="form-control" required autofocus maxlength="20" placeholder="Input Jumlah Karung"></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="simpan" class="btn btn-primary">Simpan</button></td>
                        </tr>
                    </form>
                </table>
        </div>



<?php
$this->load->view('template/js');
?>

<!--tambahkan custom js disini-->
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('template/foot');
?>