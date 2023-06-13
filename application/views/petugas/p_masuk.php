<?php
$ceks = $this->session->userdata('parkir@2017');

?>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-2"></div>
      <div class="panel panel-flat col-md-8">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <?php

              error_reporting(0);
              $printer = $printer->nama_printer;

              if (!$handle = printer_open($printer)) {
              	echo '
              	<div class="alert alert-warning alert-dismissible" role="alert">
              		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              			 <span aria-hidden="true">&times; &nbsp;</span>
              		 </button>
              		 Printer <strong>"'.$printer.'"</strong> tidak terdeteksi, Silahkan periksa kembali.
              	</div>';
              }else{
                $aktif = $this->uri->segment(3);
                if ($aktif != "") {

                    $cek_masuk = $this->Mcrud->get_masuk_by_id($aktif)->row();
                    $link_qr = $cek_masuk->qrcode;
                    $plat    = $cek_masuk->plat;

                    if ($link_qr != "") {
                      /* contoh text */
        							$text = 'Selamat datang di X';

                      date_default_timezone_set('Asia/Jakarta');
          						$tgl = date('Y-m-d');

                      //printer_set_option($handle, PRINTER_MODE, "raw");
      								printer_set_option($handle, PRINTER_PAPER_FORMAT, PRINTER_FORMAT_A4);
      								printer_set_option($handle, PRINTER_TEXT_ALIGN, PRINTER_TA_CENTER);
      								printer_start_doc($handle, "Cetak Parkir");

      								/* write the text to the print job */
      								printer_start_page($handle); //Start Text
      									$font = printer_create_font("Arial", 72, 48, 400, false, false, false, 0);
      									printer_select_font($handle, $font);
      									printer_draw_text($handle, $text, 100, 100);
      									printer_delete_font($font);

      									printer_draw_bmp($handle, "$link_qr", 0, 200, 800, 800); //X, Y, Lokasi Logo, Height, Width
      								printer_end_page($handle);  // End Logo

      								//printer_write($handle, $lipsum);
      								printer_end_doc($handle);
      								/* close the connection */
      								printer_close($handle);

                    }

                    redirect('petugas/p_masuk');
                    echo'
                    <div class="alert alert-success alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times; &nbsp; &nbsp;</span>
                       </button>
                       <strong>Sukses!</strong> No. Plat <b>"'.$plat.'"</b> Berhasil disimpan.
                    </div>';
                  }
              } ?>
              <legend class="text-bold">Parkir Masuk</legend>
              <form class="form-horizontal" action="" method="post">

                <center>
                    <div class="form-group">
                      <h1 style="margin-bottom:-10px;"><b>Jenis Kendaraan</b></h1> <br>
                        <?php foreach ($kendaraan->result() as $baris): ?>
                          <label style="height:30px;font-size:30px;"><input type="radio" name="kendaraan" value="<?php echo $baris->id_kendaraan; ?>" required> <?php echo $baris->nama_kendaraan; ?></label> &nbsp;
                        <?php endforeach; ?>
                    </div>

<hr width="80%" style="margin-bottom:0px;">
                    <div class="form-group">
                      <h1 style="margin-bottom:-10px;"><b>No. Plat</b></h1> <br>

                        <input type="text" name="plat" class="form-control" style="height:100px;font-size:100px;" value="" placeholder="BH.XXXX.XX" required maxlength="10" onkeyup="this.value = this.value.toUpperCase()" autofocus>

                    </div>

            </fieldset>
            <div class="col-md-12">
              <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Enter</button>
            </div>
              </center>
          </form>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
