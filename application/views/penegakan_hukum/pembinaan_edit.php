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
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                          if ($baris->kd_persh == $v_pembinaan->kd_persh) {
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
                    <input type="text" name="nm_persh" id="nm_persh" class="form-control" value="<?php echo $v_pembinaan->nm_persh; ?>" required maxlength="35" placeholder="Nama Perusahaan" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Usaha</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_usaha" class="form-control" value="<?php echo $v_pembinaan->nm_usaha; ?>" required maxlength="35" placeholder="Nama Usaha">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tgl Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="date" name="tgl_pembinaan" class="form-control" value="<?php echo $v_pembinaan->tgl_pembinaan; ?>" required placeholder="Tgl Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jenis Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="jns_pembinaan" class="form-control" value="<?php echo $v_pembinaan->jns_pembinaan; ?>" required maxlength="35" placeholder="Jenis Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Image Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="file" name="image_pembinaan" class="form-control" value="" placeholder="Image Pembinaan">
                    <i>*boleh dikosongkan jika tidak diubah</i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="pembinaan" class="form-control" value="<?php echo $v_pembinaan->pembinaan; ?>" required maxlength="50" placeholder="Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tindakan Pembinaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="tindakan_pembinaan" class="form-control" value="<?php echo $v_pembinaan->tindakan_pembinaan; ?>" required maxlength="50" placeholder="Tindakan Pembinaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kesimpulan</label>
                  <div class="col-lg-10">
                    <input type="text" name="kesimpulan" class="form-control" value="<?php echo $v_pembinaan->kesimpulan; ?>" required maxlength="50" placeholder="Kesimpulan">
                  </div>
                </div>

              </div>
            </div>

            <br>
            <hr>
            <a href="web/pembinaan" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
