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
          <h5 class="panel-title">Tambah Harga</h5>
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
                  <label class="control-label col-lg-2">Nama Kendaraan</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kendaraan" required>
                      <option value="">-- Pilih Kendaraan --</option>
                      <?php
                      foreach ($kendaraan->result() as $baris) {
                      ?>
                        <option value="<?php echo $baris->id_kendaraan; ?>" <?php if ($cek_harga->id_kendaraan == $baris->id_kendaraan) {echo "selected";} ?>><?php echo $baris->nama_kendaraan; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Parkir</label>
                  <div class="col-lg-10">
                    <input type="number" name="harga" class="form-control" value="<?php echo $cek_harga->harga; ?>" required maxlength="30">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Max Waktu Parkir</label>
                  <div class="col-lg-2">
                    <input type="text" name="max_jam" class="form-control" value="<?php echo substr($cek_harga->max_waktu, 0, 2); ?>" required maxlength="2" placeholder="Jam">
                  </div>
                  <div class="col-lg-2">
                    <input type="text" name="max_menit" class="form-control" value="<?php echo substr($cek_harga->max_waktu, 3, 2); ?>" required maxlength="2" placeholder="menit">
                  </div>
                  <div class="col-lg-2">
                    <input type="text" name="max_detik" class="form-control" value="<?php echo substr($cek_harga->max_waktu, -2); ?>" required maxlength="2" placeholder="detik">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga Denda Parkir</label>
                  <div class="col-lg-10">
                    <input type="number" name="denda" class="form-control" value="<?php echo $cek_harga->denda; ?>" required maxlength="30">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <a href="admin/harga" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
