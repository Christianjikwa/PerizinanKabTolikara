<?php
$ceks = $this->session->userdata('parkir@2017');
$cek = $level_petugas->row();
?>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="panel panel-flat col-md-12">
        <?php
        echo $this->session->flashdata('msg');
        ?>
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Profile</legend>
              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-2">Username</label>
                  <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" value="<?php echo $ceks; ?>" placeholder="Username" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Password</label>
                  <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password">
                  </div>
                </div>
                <hr>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Nama Petugas</label>
                      <div class="col-lg-10">
                        <input type="text" name="nama" class="form-control" value="<?php echo $cek->nama_petugas; ?>" required maxlength="100">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Tanggal Lahir</label>
                      <div class="col-lg-10 input-group">
                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                        <input type="text" name="tgl" class="form-control daterange-single" value="<?php echo date('m/d/Y', strtotime($cek->tgl_lahir)); ?>" maxlength="10" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-lg-2">Jenis Kelamin</label>
                      <div class="col-lg-10">
                        <label><input type="radio" name="jk" value="Laki-Laki" <?php if ($cek->jk == "Laki-Laki") { echo "checked";} ?> required> Laki-Laki</label> &nbsp;
                        <label><input type="radio" name="jk" value="Perempuan" <?php if ($cek->jk == "Perempuan") { echo "checked";} ?> required> Perempuan</label>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-lg-2">No HP</label>
                      <div class="col-lg-10">
                        <input type="number" name="no_hp" class="form-control" value="<?php echo $cek->no_hp; ?>" required maxlength="14">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-lg-2">Alamat</label>
                      <div class="col-lg-10">
                        <textarea name="alamat" class="form-control" rows="4" cols="80" required><?php echo $cek->alamat; ?></textarea>
                      </div>
                    </div>

            </fieldset>
            <div class="col-md-12">
              <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </form>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
