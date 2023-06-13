<?php
$cek    = $user->result();
$nama   = $cek[0]->nama_petugas;
$level  = $cek[0]->level;

$menu 		= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_2/LTR/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Apr 2017 11:59:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<base href="<?php echo base_url();?>"/>

	<title><?php echo ucwords($level); ?> | <?php echo ucwords($nama); ?></title>

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<?php
	if ($sub_menu == "p_keluar") {
	?>
	<script type="text/javascript">
	$(document).ready(function() {
		var timer;
	   $("#scan").keyup (function() {
			 clearTimeout(timer);
		   timer=setTimeout(function validate(){
				 //alert('sdf');
				 if ($('#scan').val() != "")
			   {
			     $.ajax({
			        url: "<?php echo site_url('petugas/keluar_add')?>",
			        type: 'POST',
			        data: $('.scan_plat').serialize(),
			        cache: false,
			        dataType: "JSON",
			        beforeSend: function() {
			            // setting a timeout
			        },
			        success: function(data)
			        {
								$(".scan_pesan").fadeIn();
								if (data.statusAdd) {
									$('.scan_pesan').html(data.pesan);
								}else if (data.statusAda) {
									$('.scan_pesan').html(data.pesan);
								}else if (data.statusErr) {
									$('.scan_pesan').html(data.pesan);
								}
									$('#scan').val('');
									$(".scan_pesan").delay(9500).fadeOut(300);
			        },
			      error: function (jqXHR, textStatus, errorThrown)
			      {
			          //UIkit.modal.alert('Nama Grup Menu Gagal di Simpan!');
			          //alert("Error! Silahkan cek kembali");
								$(".scan_pesan").fadeIn();
								var pesan = '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times; &nbsp;</span></button> <strong>Gagal!</strong> ID QRCODE Parkir tidak ditemukan.</div>';
								$('.scan_pesan').html(pesan);
								$('#scan').val('');
								$(".scan_pesan").delay(1500).fadeOut(300);
						}
			     });
				 }
			 },100);
	   });
	});


	</script>
	<?php
	}

	if ($sub_menu == "") {?>
	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	<!-- /theme JS files -->
	<?php
	} ?>

	<?php
	if ($sub_menu == "profile" or $sub_menu == "p_masuk" or $sub_menu == "p_keluar") {
	?>
	<script type="text/javascript" src="assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/picker_date.js"></script>

	<?php
	} ?>
	<!-- /theme JS files -->

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><img src="assets/images/logo_icon_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="foto/default.png" alt="">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="petugas/profile"><i class="icon-user"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="web/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="petugas/profile" class="media-left"><img src="foto/default.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;<?php echo $level; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if ($sub_menu == "") { echo 'active';}?>"><a href=""><i class="icon-home4"></i> <span>Beranda</span></a></li>

								<li class="<?php if ($sub_menu == "p_masuk" or $sub_menu == "p_keluar") { echo 'active';}?>">
									<a href="#"><i class="icon-file-spreadsheet2"></i> <span>Parkir</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "p_masuk") { echo 'active';}?>"><a href="petugas/p_masuk">Masuk</a></li>
										<li class="<?php if ($sub_menu == "p_keluar") { echo 'active';}?>"><a href="petugas/p_keluar">Keluar</a></li>
									</ul>
								</li>

								<li class="<?php if ($sub_menu == "lap_kendaraan" or $sub_menu == "lap_keuangan") { echo 'active';}?>">
									<a href="#"><i class="icon-printer4"></i> <span>Laporan</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "lap_kendaraan") { echo 'active';}?>"><a href="petugas/lap_kendaraan">Kendaraan</a></li>
										<li class="<?php if ($sub_menu == "lap_keuangan") { echo 'active';}?>"><a href="petugas/lap_keuangan">Keuangan</a></li>
									</ul>
								</li>
								<!-- /main -->

								<!-- Logout -->
								<li class="navigation-header"><span>Logout</span> <i class="icon-menu" title="Forms"></i></li>
								<li><a href="web/logout"><i class="icon-switch2"></i> <span>Logout </span></a></li>

								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
