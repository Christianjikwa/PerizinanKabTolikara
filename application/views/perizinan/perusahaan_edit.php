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
          <h5 class="panel-title">Edit Perusahaan</h5>
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
                  <div class="col-lg-2">
                    <input type="text" name="kd_persh" class="form-control" value="<?php echo $v_perusahaan->kd_persh; ?>" required maxlength="4" placeholder="Kode Perusahaan" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_persh" class="form-control" value="<?php echo $v_perusahaan->nm_persh; ?>" required maxlength="35" placeholder="Nama Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Alamat Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="alamat_persh" class="form-control" value="<?php echo $v_perusahaan->alamat_persh; ?>" required maxlength="35" placeholder="Alamat Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">NPWP Perusahaan</label>
                  <div class="col-lg-10">
                    <input type="text" name="npwp_persh" class="form-control" value="<?php echo $v_perusahaan->npwp_persh; ?>" required maxlength="35" placeholder="NPWP Perusahaan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Penanggung Jawab</label>
                  <div class="col-lg-10">
                    <input type="text" name="nm_pjwb" class="form-control" value="<?php echo $v_perusahaan->nm_pjwb; ?>" required maxlength="35" placeholder="Nama Penanggung Jawab">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <a href="web/perusahaan" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
