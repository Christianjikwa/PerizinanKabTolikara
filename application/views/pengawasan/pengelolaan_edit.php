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
          <h5 class="panel-title">Edit Pengelolaan</h5>
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
                          if ($baris->kd_persh == $v_pengelolaan->kd_persh) {
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
                    <input type="text" name="nm_persh" id="nm_persh" class="form-control" value="<?php echo $v_pengelolaan->nm_persh; ?>" required maxlength="35" placeholder="Nama Perusahaan" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_usaha" class="form-control" value="<?php echo $v_pengelolaan->nm_usaha; ?>" required maxlength="35" placeholder="Nama Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tahun Pengawasan</label>
                  <div class="col-lg-10">
                    <input type="text" name="th_pengawasan" class="form-control" value="<?php echo $v_pengelolaan->th_pengawasan; ?>" required maxlength="4" placeholder="Tahun Pengawasan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Waktu Pengawasan</label>
                  <div class="col-lg-10">
                    <input type="date" name="waktu_pengawasan" class="form-control" value="<?php echo $v_pengelolaan->waktu_pengawasan; ?>" required placeholder="Waktu Pengawasan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Semester</label>
                  <div class="col-lg-10">
                    <input type="text" name="semester" class="form-control" value="<?php echo $v_pengelolaan->semester; ?>" required maxlength="3" placeholder="Semester">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kesimpulan</label>
                  <div class="col-lg-10">
                    <input type="text" name="kesimpulan" class="form-control" value="<?php echo $v_pengelolaan->kesimpulan; ?>" required maxlength="50" placeholder="Kesimpulan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Hasil</label>
                  <div class="col-lg-10">
                    <input type="text" name="hasil" class="form-control" value="<?php echo $v_pengelolaan->hasil; ?>" required maxlength="50" placeholder="Hasil">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Patuh</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="patuh" required>
                        <option value="">-- Pilih --</option>
                        <option value="taat" <?php if($v_pengelolaan->patuh == "taat"){ echo "selected";} ?>>Taat</option>
                        <option value="tidak" <?php if($v_pengelolaan->patuh == "tidak"){ echo "selected";} ?>>Tidak</option>
                    </select>
                  </div>
                </div>

              </div>
            </div>

            <br>
            <hr>
            <hr>
            <a href="web/pengelolaan" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
