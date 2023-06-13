<?php
$ceks = $this->session->userdata('parkir@2017');

?>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="panel panel-flat col-md-9">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Laporan Kendaraan</legend>
              <form class="form-inline" action="petugas/cetak_kendaraan" method="post" target="_blank">
                <div class="form-group">Dari Tanggal
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                    <input type="date" name="tgl1" class="form-control daterange-single" value="" maxlength="10" required>
                  </div>
                </div>
                &nbsp; Sampai dengan Tanggal
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"><i class="icon-calendar22"></i></div>
                    <input type="date" name="tgl2" class="form-control daterange-single" value="" maxlength="10" required>
                  </div>
                </div>
                <button type="submit" name="cetak" class="btn btn-default">Cetak</button>
              </form>
            </fieldset>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
