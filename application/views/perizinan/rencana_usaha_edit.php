<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Edit Rencana Usaha</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
          <?php
          echo $this->session->flashdata('msg');
          ?>
          <form class="form-horizontal" action="" method="post">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Kode Perusahaan</label>
                  <div class="col-lg-3">
                    <select class="form-control" name="kd_persh" onchange="changeValue(this.value)" autofocus>
                      <option value="">Pilih Kode Perusahaan</option>
                      <?php
                      $jsArray = "var dtKamar = new Array();\n";
                      foreach ($v_perusahaan->result() as $baris) {
                          if ($baris->kd_persh == $v_rencana->kd_persh) {
                              $select = "selected";
                          }else{
                              $select = "";
                          }
                          echo '<option value="' . $baris->kd_persh . '" '. $select .'>' . "$baris->kd_persh [$baris->nm_persh]" . '</option>';
                          $jsArray .= "dtKamar['" . $baris->kd_persh . "'] = {
                                        nm_persh:'" . addslashes($baris->nm_persh) . "'
                                      };\n";
                      } ?>
                    </select>

                    <script type="text/javascript">
                    <?php echo $jsArray; ?>
                    function changeValue(id){
                      document.getElementById('nm_persh').value = dtKamar[id].nm_persh;
                    };
                    </script>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_persh" id="nm_persh" class="form-control" value="<?php echo $v_rencana->nm_persh; ?>" required maxlength="35" placeholder="Nama Perusahaan" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_usaha" class="form-control" value="<?php echo $v_rencana->nm_usaha; ?>" required maxlength="35" placeholder="Nama Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Uraian</label>
                  <div class="col-lg-10">
                    <input type="text" name="uraian" class="form-control" value="<?php echo $v_rencana->uraian; ?>" required maxlength="35" placeholder="Uraian">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Skala</label>
                  <div class="col-lg-10">
                    <input type="text" name="skala" class="form-control" value="<?php echo $v_rencana->skala; ?>" required maxlength="35" placeholder="Skala">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Alamat Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="alamat_usaha" class="form-control" value="<?php echo $v_rencana->alamat_usaha; ?>" required maxlength="35" placeholder="Alamat Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Telp. Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="telp_usaha" class="form-control" value="<?php echo $v_rencana->telp_usaha; ?>" required maxlength="15" placeholder="Telp. Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_ling" class="form-control" value="<?php echo $v_rencana->no_tgl_izin_ling; ?>" required maxlength="20" placeholder="No Tgl Izin Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin SKKL</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_skkl" class="form-control" value="<?php echo $v_rencana->no_tgl_izin_skkl; ?>" required maxlength="20" placeholder="No Tgl Izin SKKL">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">No Tgl Izin UKL</label>
                  <div class="col-lg-10">
                    <input type="text" name="no_tgl_izin_ukl" class="form-control" value="<?php echo $v_rencana->no_tgl_izin_ukl; ?>" required maxlength="20" placeholder="No Tgl Izin UKL">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Upaya Kelola Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="upy_kelola_ling" class="form-control" value="<?php echo $v_rencana->upy_kelola_ling; ?>" required maxlength="50" placeholder="Upaya Kelola Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Upaya Pantau Lingkungan</label>
                  <div class="col-lg-10">
                    <input type="text" name="upy_pantau_ling" class="form-control" value="<?php echo $v_rencana->upy_pantau_ling; ?>" required maxlength="50" placeholder="Upaya Pantau Lingkungan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Periode Laporan</label>
                  <div class="col-lg-10">
                    <input type="text" name="periode_laporan" class="form-control" value="<?php echo $v_rencana->periode_laporan; ?>" required maxlength="35" placeholder="Periode Laporan">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <hr>
            <a href="web/rencana_usaha" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
