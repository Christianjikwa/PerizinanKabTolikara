<?php
/*
error_reporting(0);

$text = 'Selamat datang di ...';

$printer = "Canon MP250 series";

if (!$handle = printer_open($printer)) {
	echo '
	<div class="alert alert-warning alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times; &nbsp;</span>
		 </button>
		 Printer <strong>"'.$printer.'"</strong> tidak terdeteksi, Silahkan periksa kembali.
	</div>';
}else{
	//printer_set_option($handle, PRINTER_MODE, "raw");
	printer_set_option($handle, PRINTER_PAPER_FORMAT, PRINTER_FORMAT_A4);
	printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_CENTER);
	printer_start_doc($handle, "Cetak Parkir");

	printer_start_page($handle); //Start Text
		$font = printer_create_font("Arial", 72, 48, 400, false, false, false, 0);
		printer_select_font($handle, $font);
		printer_draw_text($handle, $text, 100, 100);
		printer_delete_font($font);

		printer_draw_bmp($handle, "foto/default.bmp", 100, 100); //Lokasi Logo, Height, Width
	printer_end_page($handle);  // End Logo

	//printer_write($handle, $lipsum);
	printer_end_doc($handle);

	printer_close($handle);
}
*/
?>

					<!-- Simple login form -->
					<form action="" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
							<img src="foto/Lambang_Kabupaten_Tolikara.png" alt="Logo" width="100px">
								<h5 class="content-group">CIS Perizinan dpmptsp <small class="display-block">Kabupaten Tolikara</small></h5>
								<?php
								echo $this->session->flashdata('msg');
								?>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>



									<div class="form-group">
										<button type="submit" name="btnlogin" class="btn btn-primary btn-block" style="background-color:orange;border:1px solid #f1f1f1;">Masuk <i class="icon-circle-right2 position-right"></i></button>
									</div>

							<div class="text-center">
								<a href="web/lupa_password">Lupa Password??</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->
<!-- <center>
	<pre>
	perizinan:	    username & password : kamar1
	pengawasan: 	username & password : kamar2
	penegak hukum:	username & password : kamar3
	</pre>
</center> -->