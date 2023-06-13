<?php
$cek    = $user->result();
$nama   = $cek[0]->username;
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
	if ($sub_menu == "" or $sub_menu == "profile") {?>
	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!--
	<script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
	-->
	<!-- /theme JS files -->
	<?php
	} ?>

	<?php
	if ($sub_menu == "petugas" or $sub_menu == "kendaraan" or $sub_menu == "kendaraan_edit" or $sub_menu == "harga" or $sub_menu == "harga_edit" or $sub_menu == "printer" or $sub_menu == "printer_edit" or $sub_menu == "p_masuk" or $sub_menu == "p_keluar" or $sub_menu == "lap_kendaraan" or $sub_menu == "lap_keuangan") {?>
<!--
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
-->
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

		<script type="text/javascript" src="assets/js/core/app.js"></script>
		<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
		<!-- /theme JS files -->
	<?php
	} ?>

</head>
<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default navbar-fixed-top header-highlight">
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
						<li><a href="admin/profile"><i class="icon-user"></i> Profile</a></li>
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
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="admin/profile" class="media-left"><img src="foto/default.png" class="img-circle img-sm" alt=""></a>
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
								<li class="<?php if ($sub_menu == "") { echo 'active';}?>"><a href="admin"><i class="icon-home4"></i> <span>Beranda</span></a></li>

								<li class="<?php if ($sub_menu == "petugas" or $sub_menu == "kendaraan" or $sub_menu == "harga") { echo 'active';}?>">
									<a href="#"><i class="icon-stack2"></i> <span>Master</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "petugas") { echo 'active';}?>"><a href="admin/petugas">Petugas</a></li>
										<li class="<?php if ($sub_menu == "kendaraan" or $sub_menu == "kendaraan_edit") { echo 'active';}?>"><a href="admin/kendaraan">Kendaraan</a></li>
										<li class="<?php if ($sub_menu == "harga" or $sub_menu == "harga_edit") { echo 'active';}?>"><a href="admin/harga">Harga</a></li>
										<li class="<?php if ($sub_menu == "printer" or $sub_menu == "printer_edit") { echo 'active';}?>"><a href="admin/printer">Printer</a></li>
									</ul>
								</li>

								<li class="<?php if ($menu == "laporan") { echo 'active';}?>">
									<a href="#"><i class="icon-printer4"></i> <span>Laporan</span></a>
									<ul>
										<li class="<?php if ($sub_menu == "lap_kendaraan") { echo 'active';}?>"><a href="admin/lap_kendaraan">Kendaraan</a></li>
										<li class="<?php if ($sub_menu == "lap_keuangan") { echo 'active';}?>"><a href="admin/lap_keuangan">Keuangan</a></li>
									</ul>
								</li>

								<!-- /main -->

								<!-- Logout -->
								<li class="navigation-header"><span>Logout</span> <i class="icon-menu" title=""></i></li>
								<li><a href="web/logout"><i class="icon-switch2"></i> <span>Logout </span></a></li>

								<!-- /logout -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
