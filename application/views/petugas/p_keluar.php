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
            <center>

          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Parkir Keluar</legend>
              <form class="form-horizontal scan_plat">

                    <div class="form-group">
                      <h1 style="margin-bottom:-10px;margin-top:-10px;">SCAN QRCODE</h1> <br>

                        <input type="text" name="plat" class="form-control" style="height:100px;font-size:100px;" id="scan" value="" placeholder="scan..." maxlength="100" onkeyup="this.value = this.value.toUpperCase()" autofocus>

                    </div>
            </fieldset>
            </center>
            <!--
            <div class="col-md-12">
              <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Enter</button>
            </div>
          -->
          </form>
          </div>

      </div>
      <div class="col-md-2"></div>

      <div class="panel panel-flat col-md-8">
            <center>
              <div class="scan_pesan"></div>
            </center>

      </div>

    </div>
    <!-- /dashboard content -->
